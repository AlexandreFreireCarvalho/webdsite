<?php

namespace App\Controller;

use App\Services\CartServices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function index(CartServices $cartServices): Response
    {
        $user = $this->getUser();
        $cart = $cartServices->getFullCArt();
        return $this->render('checkout/index.html.twig',[
            'cart'=> $cart,
        ]);
    }
}
