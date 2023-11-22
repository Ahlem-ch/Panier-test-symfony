<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderDetails;
use App\Form\OrderType;
use App\Model\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * Récupération du panier, choix de l'adresse et du transporteur
     *
     * @param SessionInterface $session
     * @param Cart $cart
     * @return Response
     */
    #[Route('/commande', name: 'order')]
    public function index(SessionInterface $session, Cart $cart): Response
    {
        $user = $this->getUser();
        $cartProducts = $cart->getDetails();

        // Redirection si panier vide
        if (empty($cartProducts['products'])) {   
            return $this->redirectToRoute('product');
        }
        
        //Redirection si utilisateur n'a pas encore d'adresse
        if (!$user->getAddresses()->getValues()) {      //getValues() Récupère directement les valeurs d'une collection d'objet
            $session->set('order', 1);
            return $this->redirectToRoute('account_address_new');
        }

        $form = $this->createForm(OrderType::class, null, [
            'user' => $user     //Permet de passer l'utilisateur courant dans le tableau d'options du OrderType
        ]); 

        return $this->renderForm('order/index.html.twig', [
            'form' => $form,
            'cart' => $cartProducts,
            'totalPrice' =>$cartProducts['totals']['price']
        ]);
    }

    
}
