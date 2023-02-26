<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use App\Repository\EmployeRepository;
use App\Repository\CongeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;



#[Route('/employe')]
class EmployeController extends AbstractController
{
    #[Route('/', name: 'app_employe_index', methods: ['GET'])]
    public function index(EmployeRepository $employeRepository): Response
    {
        return $this->render('employe/index2.html.twig', [
            'employes' => $employeRepository->findAll(),
        ]);
    }
   
   
    #[Route('/list', name: 'list')]
    public function list(EmployeRepository $repository , CongeRepository $congeRepository , EntityManagerInterface $entityManager){
        $employes=$repository->findAll();


        foreach ($employes as $employe) {
            $conges = $congeRepository->findByDateDebutAndDateFin(new \DateTime());
    
            if (count($conges) > 0 && $conges[0]->getEmploye() === $employe) {
                $employe->setEtat('Congé');
            } else {
                $employe->setEtat('Disponible');
            }
        }
        $entityManager->flush();

        return $this->render('employe/index.html.twig',['employes'=>$employes]);
    }
 
   
 
    #[Route('/new', name: 'app_employe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EmployeRepository $employeRepository): Response
    {
        $employe = new Employe();
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

       
        
        if ($form->isSubmitted() && $form->isValid()) {
             $employe->setEtat('Disponible');

            $file = $form->get('img_employe')->getData();

            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('media'),
                    $fileName
                );
                $employe->setImgEmploye($fileName);
            }
          



            
            $employeRepository->save($employe, true);

            return $this->redirectToRoute('app_employe_index', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->renderForm('employe/new.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employe_show', methods: ['GET'])]
    public function show(Employe $employe): Response
    {
        return $this->render('employe/show.html.twig', [
            'employe' => $employe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_employe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employe $employe, EmployeRepository $employeRepository): Response
    {
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('img_employe')->getData();

            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                 $this->getParameter('media'),
                    $fileName
                );
                $employe->setImgEmploye($fileName);
            }
            


            $employeRepository->save($employe, true);

            return $this->redirectToRoute('app_employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employe/edit.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_employe_delete', methods: ['POST'])]
    public function delete(Request $request, Employe $employe, EmployeRepository $employeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employe->getId(), $request->request->get('_token'))) {
            $employeRepository->remove($employe, true);
        }

        return $this->redirectToRoute('app_employe_index', [], Response::HTTP_SEE_OTHER);
    }
}
