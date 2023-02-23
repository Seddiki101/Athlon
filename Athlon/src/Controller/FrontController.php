<?php

namespace App\Controller;
use App\Entity\Sujet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;


class FrontController extends AbstractController
{
    #[Route('/front', name: 'app_front')]
    public function index(): Response
    {
        $sujets = $this->getDoctrine()->getRepository(Sujet::class)->findAll();

        return $this->render('front/index.html.twig', [
            'sujet' => $sujets,
        ]);
    }


    #[Route('F/{id}', name: 'affiche_sujet_show', methods: ['GET'])]
    public function show3(Sujet $sujet): Response
    {
        return $this->render('front/show3.html.twig', [
            'sujet' => $sujet,
        ]);
    }
}
