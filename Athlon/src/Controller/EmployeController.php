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


use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Mailer;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;








use Dompdf\Dompdf;





#[Route('/employe')]
class EmployeController extends AbstractController
{
    #[Route('/', name: 'app_employe_index', methods: ['GET'])]
    public function index(EmployeRepository $employeRepository): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            // If not, redirect to a different page or display an error message
            return $this->redirectToRoute('app_home');
			}
      
            $nbEmployeesWithSalaryGreaterThan1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryGreaterThan(1000);

            // Get the number of employees with salary less than or equal to 1000
            $nbEmployeesWithSalaryLessOrEqual1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryLessThanOrEqual(1000);
            
        return $this->render('employe/index2.html.twig', [
            'nbEmployeesWithSalaryGreaterThan1000' => $nbEmployeesWithSalaryGreaterThan1000,
            'nbEmployeesWithSalaryLessOrEqual1000' => $nbEmployeesWithSalaryLessOrEqual1000,
           'employes' => $employeRepository->findAll(),
        ]);
    }
    public function index69(EmployeRepository $employeRepository): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            // If not, redirect to a different page or display an error message
            return $this->redirectToRoute('app_home');
			}
      
            $nbEmployeesWithSalaryGreaterThan1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryGreaterThan(1000);

            // Get the number of employees with salary less than or equal to 1000
            $nbEmployeesWithSalaryLessOrEqual1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryLessThanOrEqual(1000);
            
        return $this->render('employe/pdf.html.twig', [
            'nbEmployeesWithSalaryGreaterThan1000' => $nbEmployeesWithSalaryGreaterThan1000,
            'nbEmployeesWithSalaryLessOrEqual1000' => $nbEmployeesWithSalaryLessOrEqual1000,
           'employes' => $employeRepository->findAll(),
        ]);
    }
   /* #[Route('/zz', name: 'app_employe_indexzz', methods: ['GET'])]
    public function index22(EmployeRepository $employeRepository): Response
    {
        $nbEmployeesWithSalaryGreaterThan1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryGreaterThan(1000);

        // Get the number of employees with salary less than or equal to 1000
        $nbEmployeesWithSalaryLessOrEqual1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryLessThanOrEqual(1000);
             
            dump($nbEmployeesWithSalaryGreaterThan1000) ; 
            dump($nbEmployeesWithSalaryLessOrEqual1000) ; 
            return $this->render('employe/index2.html.twig', [
                'nbEmployeesWithSalaryGreaterThan1000' => $nbEmployeesWithSalaryGreaterThan1000,
                'nbEmployeesWithSalaryLessOrEqual1000' => $nbEmployeesWithSalaryLessOrEqual1000,
            
            ]);

    } */
    #[Route('/tri_nom', name: 'app_employe_tri_nom', methods: ['GET'])]
    public function index2(EmployeRepository $employeRepository): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            // If not, redirect to a different page or display an error message
            return $this->redirectToRoute('app_home');
			}
            
            $nbEmployeesWithSalaryGreaterThan1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryGreaterThan(1000);

            // Get the number of employees with salary less than or equal to 1000
            $nbEmployeesWithSalaryLessOrEqual1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryLessThanOrEqual(1000);
        return $this->render('employe/index2.html.twig', [
            'nbEmployeesWithSalaryGreaterThan1000' => $nbEmployeesWithSalaryGreaterThan1000,
            'nbEmployeesWithSalaryLessOrEqual1000' => $nbEmployeesWithSalaryLessOrEqual1000,
            'employes' => $employeRepository->findAllSortedByName(),
        ]);
    }

    #[Route('/tri_prenom', name: 'app_employe_tri_prenom', methods: ['GET'])]
    public function index3(EmployeRepository $employeRepository): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            // If not, redirect to a different page or display an error message
            return $this->redirectToRoute('app_home');
			}
            $nbEmployeesWithSalaryGreaterThan1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryGreaterThan(1000);

            // Get the number of employees with salary less than or equal to 1000
            $nbEmployeesWithSalaryLessOrEqual1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryLessThanOrEqual(1000);
        return $this->render('employe/index2.html.twig', [
            'nbEmployeesWithSalaryGreaterThan1000' => $nbEmployeesWithSalaryGreaterThan1000,
            'nbEmployeesWithSalaryLessOrEqual1000' => $nbEmployeesWithSalaryLessOrEqual1000,
            'employes' => $employeRepository->findAllSortedByName2(),
        ]);
    }
    #[Route('/tri_salaire', name: 'app_employe_tri_salaire', methods: ['GET'])]
    public function trisalaire(EmployeRepository $employeRepository): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            // If not, redirect to a different page or display an error message
            return $this->redirectToRoute('app_home');
			}
            $nbEmployeesWithSalaryGreaterThan1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryGreaterThan(1000);

            // Get the number of employees with salary less than or equal to 1000
            $nbEmployeesWithSalaryLessOrEqual1000 = $this->getDoctrine()->getRepository(Employe::class)->countBySalaryLessThanOrEqual(1000);
            
        return $this->render('employe/index2.html.twig', [
            'nbEmployeesWithSalaryGreaterThan1000' => $nbEmployeesWithSalaryGreaterThan1000,
            'nbEmployeesWithSalaryLessOrEqual1000' => $nbEmployeesWithSalaryLessOrEqual1000,
            'employes' => $employeRepository->findAllSortedBySalaire(),
        ]);
    }
   



  

    #[Route('/recherche', name: 'app_employe_recherche', methods: ['GET'])]
    public function index4(Request $request, EmployeRepository $employeRepository): Response
    {
        $query = $request->query->get('q');

        $results = $employeRepository->findByCin($query); // Remplacez "searchByTitle" par la méthode que vous utilisez pour rechercher les cours

        return $this->render('employe/index2.html.twig', [
            'employes' => $results,
            'query' => $query,
           
        ]);
    }
    
   
     



    #[Route('/pdf', name: 'employe_download_pdf', methods: ['GET'])]
    public function generatePDF(Request $request): Response
{
    // Get the employee object from the database
    
    $baseUrl = $request->getSchemeAndHttpHost() . $request->getBasePath();
    // Render the employee details as HTML using a Twig template
    $html = $this->renderView('employe/pdf.html.twig', [
        'baseUrl' => $baseUrl,
        'employes' => $this->getDoctrine()->getRepository(Employe::class)->findAll(),
        
    ]);

    // Generate the PDF using dompdf
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Return the PDF file as a response
    $response = new Response($dompdf->output());
    $response->headers->set('Content-Type', 'application/pdf');
    $response->headers->set('Content-Disposition', 'attachment;filename=listEmploye.pdf');

    return $response;
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
          


            $email = (new Email())
            ->from('athlontn@gmail.com')
            ->to('aymenghrab3@gmail.com')
            ->subject('Nouveau Employe')
            ->text('Un nouveau employe a été ajouté');
        $transport = new GmailSmtpTransport('contact.fithealth23@gmail.com','qavkrnciihzjmtkp');
        $mailer = new Mailer($transport);

        $mailer->send($email);
        $this->addFlash('success', 'L employe a été ajouté avec succès et un e-mail a été envoyé aux utilisateurs.');
            
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
