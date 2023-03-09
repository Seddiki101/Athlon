<?php

namespace App\Controller;

use App\Entity\Exercices;
use App\Form\ExercicesType;
use App\Repository\ExercicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/exercices')]
class ExercicesController extends AbstractController
{
    #[Route('/', name: 'app_exercices_index', methods: ['GET'])]
    public function index(ExercicesRepository $exercicesRepository): Response
    {
        return $this->render('exercices/index.html.twig', [
            'exercices' => $exercicesRepository->findAll(),
        ]);
    }
    #[Route("/searchEx/test", name:"app_exercices_search_page", methods: ['GET'])]
    public function search(Request $request, ExercicesRepository $repository): Response
    {
        $query = $request->query->get('q');

        $results = $repository->findByNom($query); // Remplacez "searchByTitle" par la méthode que vous utilisez pour rechercher les cours

        return $this->render('exercices/searchE.html.twig', [
            'results' => $results,
            'query' => $query
        ]);

    }
    #[Route('/tri_nomEx', name: 'app_exercices_tri_nom', methods: ['GET'])]
    public function index4(ExercicesRepository $exercicesRepository): Response
    {
        $exercice = $exercicesRepository->findAllSortedByName();

        return $this->render('exercices/index.html.twig', [
            'exercices' => $exercice,
        ]);
    }

    #[Route('/new', name: 'app_exercices_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ExercicesRepository $exercicesRepository): Response
    {
        $exercice = new Exercices();
        $form = $this->createForm(ExercicesType::class, $exercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('image_exercice')->getData();

            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('media'),
                    $fileName
                );
                $exercice->setImageExercice($fileName);
            }
            $exercicesRepository->save($exercice, true);
            return $this->redirectToRoute('app_exercices_index', [], Response::HTTP_SEE_OTHER);
           
        }

        return $this->renderForm('exercices/new.html.twig', [
            'exercice' => $exercice,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exercices_show', methods: ['GET'])]
    public function show(Exercices $exercice): Response
    {
        return $this->render('exercices/show.html.twig', [
            'exercice' => $exercice,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_exercices_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Exercices $exercice, ExercicesRepository $exercicesRepository): Response
    {
        $form = $this->createForm(ExercicesType::class, $exercice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $exercicesRepository->save($exercice, true);

            return $this->redirectToRoute('app_exercices_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('exercices/edit.html.twig', [
            'exercice' => $exercice,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_exercices_delete', methods: ['POST'])]
    public function delete(Request $request, Exercices $exercice, ExercicesRepository $exercicesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exercice->getId(), $request->request->get('_token'))) {
            $exercicesRepository->remove($exercice, true);
        }

        return $this->redirectToRoute('app_exercices_index', [], Response::HTTP_SEE_OTHER);
    }

}
