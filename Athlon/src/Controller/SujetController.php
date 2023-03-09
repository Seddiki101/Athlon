<?php

namespace App\Controller;

use App\Entity\Sujet;
use App\Form\SujetType;
use App\Repository\SujetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sujet')]
class SujetController extends AbstractController
{
    #[Route('/', name: 'app_sujet_index', methods: ['GET'])]
    public function index(SujetRepository $sujetRepository): Response
    {
        return $this->render('sujet/index2.html.twig', [
            'sujets' => $sujetRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sujet_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SujetRepository $sujetRepository): Response
    {
        $sujet = new Sujet();
        $form = $this->createForm(SujetType::class, $sujet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('imgSujet')->getData();

            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('media'),
                    $fileName
                );
                $sujet->setImgSujet($fileName);
            }




            $sujetRepository->save($sujet, true);

            return $this->redirectToRoute('app_sujet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sujet/new.html.twig', [
            'sujet' => $sujet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sujet_show', methods: ['GET'])]
    public function show2(Sujet $sujet): Response
    {
        return $this->render('sujet/show2.html.twig', [
            'sujet' => $sujet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sujet_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sujet $sujet, SujetRepository $sujetRepository): Response
    {
        $form = $this->createForm(SujetType::class, $sujet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('imgSujet')->getData();

            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('media'),
                    $fileName
                );
                $sujet->setImgSujet($fileName);
            }
            
            $sujetRepository->save($sujet, true);

            return $this->redirectToRoute('app_sujet_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sujet/edit.html.twig', [
            'sujet' => $sujet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sujet_delete', methods: ['POST'])]
    public function delete(Request $request, Sujet $sujet, SujetRepository $sujetRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sujet->getId(), $request->request->get('_token'))) {
            $sujetRepository->remove($sujet, true);
        }

        return $this->redirectToRoute('app_sujet_index', [], Response::HTTP_SEE_OTHER);
    }
}
