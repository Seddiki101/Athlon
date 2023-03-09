<?php

namespace App\Controller;

use App\Entity\Cours;
use App\Form\CoursType;
use App\Repository\CoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Mailer;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;
#[Route('/cours')]
class CoursController extends AbstractController
{


    #[Route('/', name: 'app_cours_index', methods: ['GET'])]
    public function index(CoursRepository $coursRepository): Response
    {
        return $this->render('cours/index.html.twig', [
            'cours' => $coursRepository->findAll(),
        ]);
    }


    #[Route('/tri_nom', name: 'app_cours_tri_nom', methods: ['GET'])]
    public function index2(CoursRepository $coursRepository): Response
    {
        $cour = $coursRepository->findAllSortedByName();

        return $this->render('cours/index.html.twig', [
            'cours' => $cour,
        ]);
    }
    #[Route('/tri_niveau', name: 'app_cours_tri_niveau', methods: ['GET'])]
    public function index3(CoursRepository $coursRepository, string $tri = 'facile'): Response
    {
        switch ($tri) {
            case 'facile':
                $triColonne = 'Niveau_cours';
                $triOrdre = 'ASC';
                break;
            case 'moyen':
                $triColonne = 'Niveau_cours';
                $triOrdre = 'DESC';
                break;
            case 'difficile':
                $triColonne = 'Niveau_cours';
                $triOrdre = 'DESC';
                break;
            default:
                $triColonne = 'nom';
                $triOrdre = 'ASC';
                break;
        }

        $coursList = $coursRepository->findBy(
            [],
            [$triColonne => $triOrdre]
        );

        return $this->render('cours/index.html.twig', [
            'cours' => $coursList,
        ]);
    }

    #[Route('/new', name: 'app_cours_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CoursRepository $coursRepository, MailerInterface $mailer): Response
    {
        $cour = new Cours();
        $form = $this->createForm(CoursType::class, $cour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('image_cours')->getData();

            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('media'),
                    $fileName
                );
                $cour->setImageCours($fileName);
            }
            $coursRepository->save($cour, true);
            $email = (new Email())
                ->from('athlontn@gmail.com')
                ->to('fedi.benkhlifa@esprit.tn')
                ->subject('Nouveau cours')
                ->text('Un nouveau cours a été ajouté');
            $transport = new GmailSmtpTransport('contact.fithealth23@gmail.com','qavkrnciihzjmtkp');
            $mailer = new Mailer($transport);

            $mailer->send($email);
            $this->addFlash('success', 'Le cours a été ajouté avec succès et un e-mail a été envoyé aux utilisateurs.');

            return new RedirectResponse($this->generateUrl('app_cours_index'));
        }


        return $this->renderForm('cours/new.html.twig', [
            'cour' => $cour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cours_show', methods: ['GET'])]
    public function show(Cours $cour): Response
    {
        return $this->render('cours/show.html.twig', [
            'cour' => $cour,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cours_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cours $cour, CoursRepository $coursRepository): Response
    {
        $form = $this->createForm(CoursType::class, $cour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('image_cours')->getData();

            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('media'),
                    $fileName
                );
                $cour->setImageCours($fileName);
            }
            $coursRepository->save($cour, true);

            return $this->redirectToRoute('app_cours_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cours/edit.html.twig', [
            'cour' => $cour,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cours_delete', methods: ['POST'])]
    public function delete(Request $request, Cours $cour, CoursRepository $coursRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cour->getId(), $request->request->get('_token'))) {
            $coursRepository->remove($cour, true);
        }

        return $this->redirectToRoute('app_cours_index', [], Response::HTTP_SEE_OTHER);
    }

}
