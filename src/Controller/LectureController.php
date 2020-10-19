<?php

namespace App\Controller;

use App\Entity\Chapitres;
use App\Entity\ChapitreLikes;
use App\Entity\CommentaireChapitres;
use App\Entity\CommentaireChapitresRepository;
use App\Entity\Mangas;
use App\Entity\Pages;
use App\Entity\UserCommentaireChapitres;
use App\Form\AddCommentaireToChapitreFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LectureController extends AbstractController
{
    /**
     * @Route("/lecture/{chapitreId}/{numeroPage}", name="lecture")
     */
    public function index(Request $request,$chapitreId,$numeroPage)
    {
        // Utilisateur courant
        $user = $this->getUser();
        $doctrine = $this->getDoctrine()->getManager();
        $newComment = new CommentaireChapitres();
        $em = $this->getDoctrine()->getManager();
        $numberOfComment = $this->getDoctrine()->getRepository(CommentaireChapitres::class)->countItems();
        dump($numberOfComment);
 //       dump($count);
   //     $count = $repositoryCommentaireChapitre->findByExampleField($user);

        // Si une requette ajax est envoyé on recupere les données du numero de page
        if ($request->isXmlHttpRequest() && $request->request->get('numeroPage')) {
            $numeroPage = $request->request->get('numeroPage');
        } 
        // On appelle le chapitre correspondant a l'id passé dans l'url
        $chapitre = $this->getDoctrine()->getRepository(Chapitres::class)->findOneBy(['id' => $chapitreId]);
        $soutiens = $chapitre->getArc()->getManga()->getSoutien();
        $pages = $this->getDoctrine()->getRepository(Pages::class)->findBy(['chapitre' => $chapitre, 'numero' => $numeroPage], array('numero' => 'asc'));

        // Recupere tous les commentaires du chapitre 
        $commentaireChapitres = $this->getDoctrine()->getRepository(CommentaireChapitres::class)->findBy(['chapitre' => $chapitre]);
        $userCommentaireChapitres =  $this->getDoctrine()->getRepository(UserCommentaireChapitres::class)->findBy(['commentaire' => $commentaireChapitres]);
        


        // Recupere les likes/partage du chapitre par l'utilisateur ou en fait un nouveau
        if($this->getDoctrine()->getRepository(ChapitreLikes::class)->findBy(['chapitre' => $chapitreId , 'user' => $user])) {
            $chapitreLiked = $this->getDoctrine()->getRepository(ChapitreLikes::class)->findOneBy(['chapitre' => $chapitreId , 'user' => $user]);
        } else {
            $chapitreLiked = new ChapitreLikes();
            $chapitreLiked->setChapitre($chapitre);
            $chapitreLiked->setUser($user);
            $doctrine->persist($chapitreLiked);

            // On ecrit dans la Base de données

            $doctrine->flush();
        }

            // Gere les ajout/remove de likes de l'utilisateur sur un chapitre
        if ($request->isXmlHttpRequest() && $request->request->get('isLiked')) {
            $this->isLiked( $request,$chapitreLiked,$chapitre);
            
        } else if ($request->isXmlHttpRequest() && $request->request->get('isShared')) {
           $this->isShared($request,$chapitreLiked,$chapitre);
        } else if ($request->isXmlHttpRequest() && $request->request->get('Liked')) {
                $this->isCommentLiked($request);
         }else if ($request->isXmlHttpRequest() && $request->request->get('shared')) {
            $this->isCommentShared($request);
     }

        

        // Ajoute un nouveau commentaire
        $form = $this->createForm(AddCommentaireToChapitreFormType::class,$newComment);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $newComment->setChapitre($chapitre);
            $newComment->setUser($user);
           

            // ON persist les données

            $doctrine->persist($newComment);

            // On ecrit dans la Base de données

            $doctrine->flush();
        }
        
        
        return $this->render('lecture/index.html.twig', [
            'pages' => $pages,
            'soutiens' => $soutiens,
            'chapitre' => $chapitreId,
            'numero' => $numeroPage,
            'commentaireForm' => $form->createView(),
            'chapitreLiked' => $chapitreLiked,
            'commentaireChapitres' => $commentaireChapitres,
            'userCommentaireChapitres' => $userCommentaireChapitres,
            'numberOfComment' => $numberOfComment
        ]);
    }


    /**
     * Gere les likes de chapitre par un utilsateur
     */
    public function isLiked(Request $request,$chapitreLiked,$chapitre) {
        $doctrine = $this->getDoctrine()->getManager();
        $isLiked = $request->request->get('isLiked');
      
        $isLiked = ($isLiked == 'true') ? true : false;
    
        $chapitreLiked->setIsLiked($isLiked );
        $numberOfLikes = $chapitre->getLikeNumber();
        $numberOfLikes = ($isLiked) ? $numberOfLikes + 1 : $numberOfLikes -1;
        $chapitre->setLikeNumber($numberOfLikes);

        $doctrine->persist($chapitreLiked);
        $doctrine->persist($chapitre);
        $doctrine->flush();
    }

    /**
     * Gere les partages de chapitre par un utilsateur
     */
    public function isShared($request,$chapitreLiked,$chapitre) {
        $doctrine = $this->getDoctrine()->getManager();
        $isShared = $request->request->get('isShared');
       
        $isShared = ($isShared == 'true') ? true : false;
      
        $chapitreLiked->setIsShared($isShared );
        $numberOfShare = $chapitre->getShareNumber();
        $numberOfShare = ($isShared) ? $numberOfShare + 1 : $numberOfShare -1;
        $chapitre->setShareNumber($numberOfShare);

        $doctrine->persist($chapitreLiked);
        $doctrine->persist($chapitre);
        $doctrine->flush();
    }

    public function isCommentLiked(Request $request) {
      $doctrine = $this->getDoctrine()->getManager();
      $user = $this->getUser();
      $commentaireId = $request->request->get('commentaireId');
      $like = $request->request->get('Liked');
   
      // Le commentaire liké (instance de CommentaireChapitres)
      $commentaireLiked = $this->getDoctrine()->getRepository(CommentaireChapitres::class)->findOneBy(['id' => $commentaireId]);

      // TESTE
      if($this->getDoctrine()->getRepository(UserCommentaireChapitres::class)->findBy(['commentaire' => $commentaireId , 'user' => $user])) {
        $commentaireJoinLike = $this->getDoctrine()->getRepository(UserCommentaireChapitres::class)->findOneBy(['commentaire' => $commentaireId , 'user' => $user]);
    } else {
        $commentaireJoinLike = new UserCommentaireChapitres();
        $commentaireJoinLike->setCommentaire($commentaireLiked);
        $commentaireJoinLike->setUser($user);

        // On ecrit dans la Base de données

        
    }
    // FIN TESTE
      // Definie si le commentaire a été like ou non et par quel utilisateur 
      
      $like = ($like == 'true') ? true : false;
      $commentaireJoinLike->setIsLiked($like);

      // Ajoute un like au nombre des likes du commentaire

      $numberOfLikes = $commentaireLiked->getLikeNumber();
      $numberOfLikes = ($like) ? $numberOfLikes + 1 : $numberOfLikes -1;
      $commentaireLiked->setLikeNumber($numberOfLikes);

      $doctrine->persist($commentaireLiked);
      $doctrine->persist($commentaireJoinLike);
      $doctrine->flush();
    }

    public function isCommentShared(Request $request) {
        $doctrine = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $commentaireId = $request->request->get('commentaireId');
        $share = $request->request->get('shared');
        
        // Le commentaire partagé (instance de CommentaireChapitres)
        $commentaireShared = $this->getDoctrine()->getRepository(CommentaireChapitres::class)->findOneBy(['id' => $commentaireId]);
        // Si le commentaire existe on le recupere sinon on le crée
        if($this->getDoctrine()->getRepository(UserCommentaireChapitres::class)->findBy(['commentaire' => $commentaireId , 'user' => $user])) {
          $commentaireJoinShare = $this->getDoctrine()->getRepository(UserCommentaireChapitres::class)->findOneBy(['commentaire' => $commentaireId , 'user' => $user]);
      } else {
          $commentaireJoinShare = new UserCommentaireChapitres();
          $commentaireJoinShare->setCommentaire($commentaireShared);
          $commentaireJoinShare->setUser($user);
  
      }
        // Definie si le commentaire a été partagé ou non et par quel utilisateur 
        
        $share = ($share == 'true') ? true : false;
        $commentaireJoinShare->setIsShared($share);

        $numberOfShares = $commentaireShared->getShareNumber();
        $numberOfShares = ($share) ? $numberOfShares + 1 : $numberOfShares -1;
        $commentaireShared->setLikeNumber($numberOfShares);
  
        $doctrine->persist($commentaireShared);
  
        $doctrine->persist($commentaireJoinShare);
        $doctrine->flush();
      }

}
