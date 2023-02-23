<?php

namespace App\Controller;

use App\Entity\Cours;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListFrontController extends AbstractController
{
    #[Route('/list-cours', name: 'list_cours')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Cours::class);
        $cours = $repository->findAll();

        return $this->render('listFront/index.html.twig', array(
            'cours' => $cours
        ));
    }
    #[Route('/{id}', name: 'app_ListFront_details', methods: ['GET'])]
    public function show(Cours $id): Response
    {
        return $this->render('ListFront/details.html.twig', [
            'cour' => $id,
        ]);
    }
}


