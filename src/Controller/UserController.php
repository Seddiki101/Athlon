<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\UserTypedit;
use App\Form\UserTypedit2;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Bundle\SnappyBundle\Snappy\Response\SnappyResponse;
use Knp\Snappy\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
		
			if (!$this->isGranted('ROLE_ADMIN')) {
            // If not, redirect to a different page or display an error message
            return $this->redirectToRoute('app_home');
			}
		
		
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository): Response
    {
		
		
		if (!$this->isGranted('ROLE_ADMIN')) {
            // If not, redirect to a different page or display an error message
            return $this->redirectToRoute('app_home');
			}
		
		
		
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
		
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }
	
	
	
	
	
	
	
	
	    #[Route('/B/{id}', name: 'app_user_show2', methods: ['GET'])]
    public function show2(User $user): Response
    {
		
		if (!$this->isGranted('ROLE_ADMIN')) {
            // If not, redirect to a different page or display an error message
            return $this->redirectToRoute('app_home');
			}
			
		
        return $this->render('user/show2.html.twig', [
            'user' => $user,
        ]);
    }
	
	
	
	

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
		
        $form = $this->createForm(UserTypedit::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			
			
			
			//images
			$file = $form->get('imgUsr')->getData();
            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('media'),
                    $fileName
                );
                $user->setImgUsr($fileName);
            }
			

            $userRepository->save($user, true);

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
	
	
	
	
	
	    #[Route('/{id}/edit2', name: 'app_user_edit2', methods: ['GET', 'POST'])]
    public function edit2(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserTypedit2::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit2.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	    #[Route('/', name: 'app_userSort_index', methods: ['GET'])]
    public function sortName(UserRepository $userRepository): Response
    {
			if (!$this->isGranted('ROLE_ADMIN')) {
            // If not, redirect to a different page or display an error message
            return $this->redirectToRoute('app_home');
			}

        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAllSortedByName(),
        ]);

    }




    #[Route('/', name: 'app_userPDF2', methods: ['GET'])]
    //public function downloadPdf(Pdf $snappy, UserRepository $userRepository): Response
     public function downloadPdf(Knp\Snappy\Pdf $snappy, UserRepository $userRepository): SnappyResponse
    {
        // Generate the PDF content
        $loader = new FilesystemLoader('../templates');
        $twig = new Environment($loader);
        $html = $twig->renderView('user/userPDF.html.twig', [
            'users' => $userRepository->findAll(),
        ]);

      //  $snappy = $this->get('knp_snappy.pdf');
        $pdfContent = $snappy->getOutputFromHtml($html);
        //
        return new PdfResponse(
            $pdfContent,
            'document.pdf',
            'application/pdf',
            'inline' // or 'attachment' to force a download
        );
        //

        /*
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'attachment; filename="'."userList".'.pdf"'
            )
        );
        */

    }



    #[Route('/', name: 'app_userPDF', methods: ['GET'])]
    public function pdf(UserRepository $userRepository)
    {

          /*
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
        */









        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($pdfOptions);
        $html = $this->renderView('user/userPDF.html.twig', [
            'users' => $userRepository->findAll(),
        ]);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();


        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);

    }
	
	
}
