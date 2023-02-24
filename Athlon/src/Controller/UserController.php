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
}
