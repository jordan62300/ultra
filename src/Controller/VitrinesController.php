<?php

namespace App\Controller;

use App\Entity\Vitrine;
use App\Form\VitrineEmailFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VitrinesController extends AbstractController
{
    /**
     * @Route("/vitrine", name="vitrine")
     */
    public function index(Request $request)
    {
        
        // Instance de AdminValidation
        $vitrine = new Vitrine();
        $form = $this->createForm(VitrineEmailFormType::class, $vitrine);

        $form->handleRequest($request);

        // On verifie si le formulaire a été envoyé et si les données sont valides

        if ($form->isSubmitted() && $form->isValid()) {
            $doctrine = $this->getDoctrine()->getManager();

            $doctrine->persist($vitrine);

            // On ecrit dans la Base de données

            $doctrine->flush();
        }


        return $this->render('vitrine/index.html.twig', [
            'vitrineForm' => $form->createView(),
            'controller_name' => 'VitrineController',
        ]);
    }
}
