<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeType;
use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/commande")
 */
class CommandeController extends AbstractController
{
    /**
     * @Route("/", name="app_commande_index", methods={"GET"})
     */
    public function index(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/mes/Commandes", name="mesCommande", methods={"GET"})
     */
    public function mesCommande(CommandeRepository $commandeRepository): Response
    {
        $commande = $commandeRepository->findBy([
            "user" => 3,
            "statue" => "placed"
        ]);
        return $this->render('commande/mesCommande.html.twig', [
            'commandes' => $commande,
        ]);
    }

    /**
     * @Route("/orderCOmmande", name="orderCommande")
     */
    public function placeOrder(\App\Service\CartService1 $cartService, \App\Service\CommandeService $commandeService)
    {
        $commandeService->placeOrder($cartService->getCurrentOrder(), $cartService, $this->getDoctrine()->getManager());
        $this->addFlash('success', 'commande order success');
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/new", name="app_commande_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CommandeRepository $commandeRepository): Response
    {
        $commande = new Commande();
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandeRepository->add($commande, true);

            return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande/new.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{idC}", name="app_commande_show", methods={"GET"})
     */
    public function show(Commande $commande): Response
    {
        return $this->render('commande/show.html.twig', [
            'commande' => $commande,
        ]);
    }

    /**
     * @Route("/{idC}/edit", name="app_commande_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Commande $commande, CommandeRepository $commandeRepository): Response
    {
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandeRepository->add($commande, true);

            return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande/edit.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{idC}", name="app_commande_delete", methods={"POST"})
     */
    public function delete(Request $request, Commande $commande, CommandeRepository $commandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $commande->getIdC(), $request->request->get('_token'))) {
            $commandeRepository->remove($commande, true);
        }

        return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/front/{idC}", name="app_commande_delete_front", methods={"POST"})
     */
    public function deletefront(Request $request, Commande $commande, CommandeRepository $commandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $commande->getIdC(), $request->request->get('_token'))) {
            $commandeRepository->remove($commande, true);
        }

        return $this->redirectToRoute('mesCommande', [], Response::HTTP_SEE_OTHER);
    }
}
