<?php

namespace App\Controller;

use App\Entity\AdminValidation;
use App\Entity\Arcs;
use App\Entity\Chapitres;
use App\Entity\Mangas;
use App\Entity\Pages;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        // On appelle la liste de tous les mangas
        $mangas = $this->getDoctrine()->getRepository(Mangas::class)->findBy(array(),array('soutien' => 'DESC'));
        dump($mangas[0]);


        /* TESTE */
        /*
        if ($request->isXmlHttpRequest() || $request->query->get('id')) {  
            $id =  $request->request->get('id');
            $manga = $this->getDoctrine()->getRepository(Mangas::class)->findOneBy(['id' => $id]);
            $arc = $this->getDoctrine()->getRepository(Arcs::class)->findOneBy(['manga' => $manga]);
            
            $chapitre = $this->getDoctrine()->getRepository(Chapitres::class)->findOneBy(['arc' => $arc]);
            dd($id);
            $pages = $this->getDoctrine()->getRepository(Pages::class)->findBy(['chapitre' => $chapitre]);
            return $this->render('home/index.html.twig', [
                'mangas' => $mangas,
                'pages' => $pages
            ]);
         } 
             */

        /* FIN TESTE */
        
        return $this->render('home/index.html.twig', [
            'mangas' => $mangas
            
        ]);
    }


    

    
}
