<?php

namespace App\Controller;
use App\Entity\Article;
use App\Entity\Sujet;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestfrontController extends AbstractController
{
    #[Route('/testfront', name: 'app_testfront')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Article::class);
        $articles= $repository->findAll();
        return $this->render('affichFront.html.twig', [
             'controller_name' => 'TestfrontController',
             'articles' => $articles,
        ]);
    }
    #[Route('/{id}', name: 'app_testfront_details', methods: ['GET'])]
    public function show2(Article $article): Response
    {
        return $this->render('testfront/details.html.twig', [
            'article' => $article,
        ]);
    }
}
