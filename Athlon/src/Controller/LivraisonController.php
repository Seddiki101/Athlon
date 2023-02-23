<?php

namespace App\Controller;

use App\Entity\Livraison;
use App\Form\LivraisonType;
use App\Repository\LivraisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/livraison")
 */
class LivraisonController extends AbstractController
{
    /**
     * @Route("/", name="app_livraison_index", methods={"GET"})
     */
    public function index(LivraisonRepository $livraisonRepository): Response
    {
        return $this->render('livraison/livraisonBack.html.twig', [
            'livraisons' => $livraisonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{idC}", name="app_livraison_new", methods={"GET", "POST"})
     */
    public function new($idC, Request $request, LivraisonRepository $livraisonRepository, \App\Repository\CommandeRepository $commandeRepository): Response
    {
        $livraison = new Livraison();
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livraison->setDate(new \DateTime());
            $livraison->setCommande($commandeRepository->findOneBy(["idC" => $idC]));
            $livraisonRepository->add($livraison, true);

            return $this->redirectToRoute('mesCommande', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('livraison/new.html.twig', [
            'livraison' => $livraison,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/back/new", name="app_livraison_new_back", methods={"GET", "POST"})
     */
    public function newBack(Request $request, LivraisonRepository $livraisonRepository, \App\Repository\CommandeRepository $commandeRepository): Response
    {
        $livraison = new Livraison();
        $form = $this->createForm(\App\Form\LivraisonBackType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livraison->setDate(new \DateTime());
            $livraisonRepository->add($livraison, true);

            return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('livraison/new_back.html.twig', [
            'livraison' => $livraison,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_livraison_show", methods={"GET"})
     */
    public function show(Livraison $livraison): Response
    {
        return $this->render('livraison/show.html.twig', [
            'livraison' => $livraison,
        ]);
    }

    /**
     * @Route("/{idC}/edit", name="app_livraison_edit", methods={"GET", "POST"})
     */
    public function edit($idC, Request $request, LivraisonRepository $livraisonRepository): Response
    {
        $livraison = $livraisonRepository->findOneBy(['commande' => $idC]);
        $form = $this->createForm(LivraisonType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livraisonRepository->add($livraison, true);
            return $this->redirectToRoute('mesCommande', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('livraison/edit.html.twig', [
            'livraison' => $livraison,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/back/{id}/edit", name="app_livraison_edit_back", methods={"GET", "POST"})
     */
    public function editBack(Livraison $livraison, Request $request, LivraisonRepository $livraisonRepository): Response
    {
        $form = $this->createForm(\App\Form\LivraisonBackType::class, $livraison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $livraisonRepository->add($livraison, true);
            return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('livraison/edit_back.html.twig', [
            'livraison' => $livraison,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/editConfirmation", name="app_livraison_editconfirm", methods={"GET", "POST"})
     */
    public function editconfrim(Livraison $livraison, Request $request, LivraisonRepository $livraisonRepository): Response
    {
        $livraison->setConfirmer(1);

        $livraisonRepository->add($livraison, true);

        return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);

    }

    /**
     * @Route("/{id}", name="app_livraison_delete", methods={"POST"})
     */
    public function delete(Request $request, Livraison $livraison, LivraisonRepository $livraisonRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $livraison->getId(), $request->request->get('_token'))) {
            $livraisonRepository->remove($livraison, true);
        }

        return $this->redirectToRoute('app_livraison_index', [], Response::HTTP_SEE_OTHER);
    }
}
