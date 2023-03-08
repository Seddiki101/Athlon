<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Produit;
use App\Repository\CommandeRepository;
use App\Repository\ProduitRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(): Response
    {
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
        ]);
    }

    #[Route('/listproduit', name: 'produit_list')]
    public function list(ProduitRepository $repository){
        $produit=$repository->findAll();
        return $this->render('panier/index.html.twig',['produit'=>$produit]);

    }




    #[Route('/addProduitToPanier/{id}', name: 'addProduitToPanier')]
    public function addProduitToPanier($id, ManagerRegistry $em,ProduitRepository $repo): Response
    {
        $produit=$repo->find($id);


        $commande = new Commande();
        $commande->setIdP($produit);
        $em = $em->getManager();
        $em->persist($commande);
        $em->flush();

        return $this->redirectToRoute("produit_list");


    }

    #[Route('/listCommande', name: 'listCommande')]
    public function listCommande(CommandeRepository $repository,ProduitRepository $produitRepository){
        $commande=$repository->findAll();
        $produits = array();



        foreach ($commande as $entity){
            $produit=new Produit();
            $produit=$produitRepository->find($entity->getIdP());
            array_push($produits,$produit);

        }



        return $this->render('panier/commande.html.twig',['produit'=>$produits]);

    }




}
