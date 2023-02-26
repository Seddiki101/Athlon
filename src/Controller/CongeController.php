<?php

namespace App\Controller;

use App\Entity\Conge;
use App\Form\CongeType;
use App\Repository\CongeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Employe;
use App\Form\EmployeType;
use App\Repository\EmployeRepository;

#[Route('/conge')]
class CongeController extends AbstractController
{
    #[Route('/', name: 'app_conge_index', methods: ['GET'])]
    public function index(CongeRepository $congeRepository): Response
    {
        return $this->render('conge/index2.html.twig', [
            'conges' => $congeRepository->findAll(),
        ]);
        
    }

    #[Route('/new', name: 'app_conge_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CongeRepository $congeRepository, EntityManagerInterface $entityManager, EmployeRepository $employeRepository): Response
    {
        $conge = new Conge();
        $form = $this->createForm(CongeType::class, $conge);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $employe = $conge->getEmploye();
    
            $congeRepository->save($conge, true);
    
            // Update employe etat
            $conges = $congeRepository->findByDateDebutAndDateFin(new \DateTime());
            $etat = 'Disponible';
    
            foreach ($conges as $conge) {
                if ($conge->getEmploye() === $employe) {
                    $etat = 'Congé';
                    break; // exit the loop once a matching conge is found
                }
            }
    
            $employe->setEtat($etat);
            $employeRepository->save($employe);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_conge_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('conge/new.html.twig', [
            'conge' => $conge,
            'form' => $form,
        ]);
    }
    
    
    

    #[Route('/{id}', name: 'app_conge_show', methods: ['GET'])]
    public function show(Conge $conge): Response
    {
        return $this->render('conge/show.html.twig', [
            'conge' => $conge,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_conge_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Conge $conge, CongeRepository $congeRepository, EmployeRepository $employeRepository, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CongeType::class, $conge);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $employe = $conge->getEmploye();
            $congeRepository->save($conge, true);
    
            // Update employe etat
            $conges = $congeRepository->findByDateDebutAndDateFin(new \DateTime());
            $etat = 'Disponible';
      
            foreach ($conges as $conge) {
                if ($conge->getEmploye() === $employe) {
                    $etat = 'Congé';
                    break; // exit the loop once a matching conge is found
                }
            }
    
            $employe->setEtat($etat);
            $employeRepository->save($employe);
            $entityManager->flush();
    
            return $this->redirectToRoute('app_conge_index', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('conge/edit.html.twig', [
            'conge' => $conge,
            'form' => $form,
        ]);
    }
    

    #[Route('/{id}', name: 'app_conge_delete', methods: ['POST'])]
public function delete(Request $request, Conge $conge, CongeRepository $congeRepository, EmployeRepository $employeRepository, EntityManagerInterface $entityManager): Response
{
    if ($this->isCsrfTokenValid('delete'.$conge->getId(), $request->request->get('_token'))) {
        $employe = $conge->getEmploye();

        $congeRepository->remove($conge, true);

        // Update employe etat
        $conges = $congeRepository->findByDateDebutAndDateFin(new \DateTime());
        $etat = 'Disponible';

        foreach ($conges as $conge) {
            if ($conge->getEmploye() === $employe) {
                $etat = 'Congé';
                break; // exit the loop once a matching conge is found
            }
        }

        $employe->setEtat($etat);
        $employeRepository->save($employe);
        $entityManager->flush();
    }

    return $this->redirectToRoute('app_conge_index', [], Response::HTTP_SEE_OTHER);
}

}
