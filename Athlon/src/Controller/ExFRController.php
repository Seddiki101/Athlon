<?php

namespace App\Controller;

use App\Entity\Exercices;
use App\Repository\ExercicesRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExFRController extends AbstractController
{
    #[Route('/ex/f/r', name: 'app_ex_f_r')]
    public function index(): Response
    {
        $exercices = $this->getDoctrine()->getRepository(Exercices::class)->findAll();

        return $this->render('ex_fr/index.html.twig', [
            'exercices' => $exercices,
        ]);
    }

    #[Route('/exercice/{id}', name: 'app_exercices_details')]
    public function show($id, ExercicesRepository $exercicesRepository)
    {
        $exercice = $exercicesRepository->find($id);

        return $this->render('ex_fr/detailsEX.html.twig', [
            'exercice' => $exercice,
        ]);
    }
}
