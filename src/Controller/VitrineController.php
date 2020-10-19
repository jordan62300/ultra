<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VitrineController extends AbstractController
{
    /**
     * @Route("/vitrine", name="vitrine")
     */
    public function index()
    {
        return $this->render('vitrine/index.html.twig', [
            'controller_name' => 'VitrineController',
        ]);
    }
}
