<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Repository\CoursRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
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
    #[Route('/tri_nomF', name: 'app_coursFR_tri_nom', methods: ['GET'])]
    public function index2(CoursRepository $coursRepository): Response
    {
        $cour = $coursRepository->findAllSortedByName();

        return $this->render('listFront/index.html.twig', [
            'cours' => $cour,
        ]);
    }


    #[Route('/cours/f/{id}', name: 'app_ListFront_cours', methods: ['GET'])]
    public function show(Cours $id): Response
    {
        return $this->render('ListFront/details.html.twig', [
            'cour' => $id,
        ]);
    }




}


