<?php

namespace App\Controller;

use App\Repository\EmployeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EmployeRepository $repository): Response
    {
        $employes = $repository->findAll();

        return $this->render('employe/index.html.twig', [
            'employes' => $employes,
        ]);
    }

    #[Route('/back', name: 'app_home_back')]
    public function index2(EmployeRepository $repository): Response
    {
        $employes = $repository->findAll();

        return $this->render('employe/index2.html.twig', [
            'employes' => $employes,
        ]);
    }
}
