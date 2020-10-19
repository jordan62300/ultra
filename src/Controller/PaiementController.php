<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Stripe\Charge;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use  Stripe\StripeObject;
use  Stripe\ApiResource;


class PaiementController extends AbstractController
{
    /**
     * @Route("/paiement", name="paiement")
     */
    public function index()
    {

        

        $prix = (float)5;

        // On instancie Stripe


     //   $stripe =  new StripeClient('ss');


        
        \Stripe\Stripe::setApiKey('sk_test_51HQB05ATKGMnwbpsPEfApyttgehNJibLmVS2x1IAXn14cXPjtMezn9lpbfLImJ5nNLgbrbc98f8o8mfgHWyp0Y6G00lmuNARg4');

        $intent = \Stripe\PaymentIntent::create([
              'amount' => $prix*100,
              'currency' => 'eur'
        ]);

     //   dd($intent);



        return $this->render('paiement/index.html.twig', [
            'controller_name' => 'PaiementController',
            'client_secret' => $intent['client_secret']
        ]);
    }
}
