<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController
{

    /**
     * @Route("/cart", name="cart")
     */
    public function index(Request $request,\App\Service\CartService1 $cartService , \App\Repository\CommandeItemRepository $commandeItemRepository, \App\Repository\ProduitRepository $produitRepository): Response
    {

        return $this->render('cart/index.html.twig',[
            'items' => $cartService->getCart(),
//            'total' => $cartService->getTotal(),
//            'orders' => $cartService->getPlacedOrders(),
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add (Request $request, $id,\App\Service\CartService1 $cartService){
        $cartService->add($id);
        $this->addFlash(
            'info',
            'Item has been added !'
        );
        return $this->redirectToRoute('cart');
    }
    /**
     * @Route("/listproduit", name="produit_list")
     */
    public function list(\App\Repository\ProduitRepository $repository){
        $produit=$repository->findAll();
        return $this->render('produit/index.html.twig',['produits'=>$produit]);

    }

    /**
     * @Route("/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id,\App\Service\CartService1 $cartService){

        $cartService->remove($id);
        $this->addFlash(
            'info',
            'Item has been removed !'
        );
        return $this->redirectToRoute("cart");
    }
//
//
//    /**
//     * @Route("/cart/update", methods={"POST"}, name="cart_update")
//     */
//    public function update(CartService  $cartService , Request $request){
//
//        $cartService->update($request->request->get('id'),$request->request->get('quantity'));
//        $this->addFlash(
//            'info',
//            'Item has been updated !'
//        );
//        return $this->redirectToRoute("cart");
//    }
//
//    /**
//     * @Route("/cart/orderDetails/{id}" , name="orderDetails")
//     */
//    public function orderDetails($id, CartService $cartService,OrdersItemsRepository $ordersItemsRepository){
//        return $this->render('cart/partials/orderDetails.html.twig',[
//            'order' => $cartService->getOrder($id),
//            'items' => $ordersItemsRepository -> findBy(['order' =>  $cartService->getOrder($id)])
//        ]);
//    }
//
//    /**
//     * @Route("/cart/getJsonCart/{id}" , name="getJsonCart")
//     */
//    public function getJsonCart(CartService  $cartService, NormalizerInterface $normalizer){
//        $items = $cartService->getJsonCart();
//
//        $jsonContent = $normalizer->normalize($items,'json',['groups'=>'post:read']);
//        return new Response(json_encode($jsonContent));
//    }
}