<?php

namespace App\Controller;

use App\Entity\Arcs;
use App\Entity\Chapitres;
use App\Entity\Mangas;
use App\Entity\Pages;
use App\Form\AjoutArcFormType;
use App\Form\AjoutChapitreFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjoutMangaFormType;
use App\Form\AjoutPageFormType;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profilManga", name="profilManga")
     */
    public function index()
    {
        return $this->render('profil/profilManga.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    /**
     * @Route("/profil/dragdrop/{id}", name="dragdrop")
     */
    public function dragdrop(Request $request , $id)
    {
        $chapitre = $this->getDoctrine()->getRepository(Chapitres::class)->findOneBy(['id' => $id]);
        $pages = $this->getDoctrine()->getRepository(Pages::class)->findBy(['chapitre' => $chapitre] , array('numero' => 'asc'));
        
        if ($request->isXmlHttpRequest()) {
        $ids =  $request->request->get('img_ids');
        $numeros =   $request->request->get('img_numeros');
        $manager = $this->getDoctrine()->getManager();


            for($i = 0 ; $i < count($ids); $i++){
                $page = $this->getDoctrine()->getRepository(Pages::class)->findOneBy(['id' => $ids[$i]]);
                $page->setNumero($numeros[$i]);
                $manager->persist($page);
                $manager->flush();

        }

    }
        return $this->render('profil/dragdrop.html.twig', [
            'pages' => $pages,
            'id' => $id
        ]);
}


    /**
     * @Route("/profil/ajoutManga", name="new_manga")
     */
    public function newManga(Request $request)
    {


        // Recupere l'utilisateur courant
        $user = $this->getUser();
        // On appelle la liste de tous les mangas
        $mangas = $this->getDoctrine()->getRepository(Mangas::class)->findAll();

        // Instance de AdminValidation
        $nouveauManga = new Mangas();

        // Creation de l'objet formulaire
        $form = $this->createForm(AjoutMangaFormType::class, $nouveauManga);

        //On recupere les données saisies
        $form->handleRequest($request);

        // On verifie si le formulaire a été envoyé et si les données sont valides

        if ($form->isSubmitted() && $form->isValid()) {
            $nouveauManga->setUsers($user);
            $nouveauManga->setCreatedAt(new \DateTime('now'));
            $nouveauManga->setStatut('en attente');
            $nouveauManga->setScore(0);
            $nouveauManga->setSoutien(0);
            $nouveauManga->setPartenaire(false);
            $nouveauManga->setGrade(0);
            $nouveauManga->setType('manga');


            // ON instancie Doctrine 
            $doctrine = $this->getDoctrine()->getManager();

            // ON persist les données

            $doctrine->persist($nouveauManga);

            // On ecrit dans la Base de données

            $doctrine->flush();
            return $this->redirectToRoute('new_arc', array('id' => $nouveauManga->getId()));
        }

        return $this->render('profil/nouveauManga.html.twig', [
            'mangas' => $mangas,
            'mangaForm' => $form->createView()
        ]);
    }


     /**
     * @Route("/profil/ajoutArc/{id}", name="new_arc")
     */
    public function newArc(Request $request, $id)
    {
        $manga = $this->getDoctrine()->getRepository(Mangas::class)->findOneBy(['id' => $id]);



        $nouveauArc = new Arcs();

        $form = $this->createForm(AjoutArcFormType::class, $nouveauArc);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $nouveauArc->setManga($manga);

            $doctrine = $this->getDoctrine()->getManager();

            $doctrine->persist($nouveauArc);

            $doctrine->flush();
            return $this->redirectToRoute('new_chapitre', array('mangaId' => $id ,'id' => $nouveauArc->getId()));
        }

        return $this->render('profil/nouveauArc.html.twig', [
            'arcForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/profil/ajoutChapitre/{mangaId}/{id}", name="new_chapitre")
     */
    public function newChapitre(Request $request,$mangaId, $id)
    {

        $arc = $this->getDoctrine()->getRepository(Arcs::class)->findOneBy(['id' => $id]);



        $nouveauChapitre = new Chapitres();

        $form = $this->createForm(AjoutChapitreFormType::class, $nouveauChapitre);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $nouveauChapitre->setArc($arc);
            $nouveauChapitre->setStatut('En attente');

            $doctrine = $this->getDoctrine()->getManager();

            $doctrine->persist($nouveauChapitre);

            $doctrine->flush();
            return $this->redirectToRoute('new_page', array('mangaId' => $mangaId ,'arcId' => $id ,'id' => $nouveauChapitre->getId()));
        }

        return $this->render('profil/nouveauChapitre.html.twig', [
            'chapitreForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/profil/ajoutPage/{mangaId}/{arcid}/{id}", name="new_page")
     */
    public function newPage(Request $request,$mangaId,$arcid, $id)
    {
        // Selectionne le chapitre correspondant a l'id passé dans l'url
        $chapitre = $this->getDoctrine()->getRepository(Chapitres::class)->findOneBy(['id' => $id]);

        // Recupere tous les pages du chapitre
        $pages = $this->getDoctrine()->getRepository(Pages::class)->findBy(['chapitre' => $chapitre], array('numero' => 'asc'));

        $nouvellePage = new Pages();

        //Recupere les arcs par mangaId
        $manga =  $this->getDoctrine()->getRepository(Mangas::class)->findOneBy(['id' => $mangaId]);
        $arcs = $this->getDoctrine()->getRepository(Arcs::class)->findBy(['manga' => $manga]);
        
        // Creer un formulaire et passe l'id de l'arc en  option
        $form = $this->createForm(AjoutPageFormType::class, $nouvellePage,array(
            'arcid' => $arcid
        ));

        $form->handleRequest($request);
        $doctrine = $this->getDoctrine()->getManager();

        // TESTE

        if ($request->isXmlHttpRequest()) {
            $ids =  $request->request->get('img_ids');
            $numeros =   $request->request->get('img_numeros');
            $manager = $this->getDoctrine()->getManager();
    
    
                for($i = 0 ; $i < count($ids); $i++){
                    $page = $this->getDoctrine()->getRepository(Pages::class)->findOneBy(['id' => $ids[$i]]);
                    $page->setNumero($numeros[$i]);
                    $manager->persist($page);
                    $manager->flush();
    
            }
    
        }

        // FIN TESTE

        // Recupe la derniere page  du chapitre 
        $lastPage = $doctrine->getRepository(Pages::class)->findOneBy(array('chapitre' => $chapitre), array('numero' => 'DESC'));

        // recupere le numero de la dernier page  ou le met a 0 si il n'existe pas
        $lastNumero = ($lastPage) ? $lastPage->getNumero() : 0;

        if($request)
        if ($form->isSubmitted() && $form->isValid()) {


            $nouvellePage->setChapitre($chapitre);
            $nouvellePage->setNumero($lastNumero + 1);
            $nouvellePage->setStatut('En attente');

            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($nouvellePage);
            $doctrine->flush();
        }

        return $this->render('profil/nouvellePage.html.twig', [
            'pageForm' => $form->createView(),
            'chapitre' => $chapitre,
            'pages' => $pages,
            'arcs' => $arcs,
            'id' => $id,
            'arcid' =>$arcid,
            'mangaId' => $mangaId
        ]);
    }
}
