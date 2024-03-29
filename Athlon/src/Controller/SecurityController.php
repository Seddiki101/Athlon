<?php

namespace App\Controller;

use App\Entity\User;
use Twig\Environment;
use App\Form\ResetPassType;
use App\Form\ResetPasswordType;
use App\Form\ForgotPasswordType;
use Symfony\Component\Mime\Email;

use Twig\Loader\FilesystemLoader;
use App\Repository\UserRepository;
use Symfony\Component\Mailer\Mailer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;



class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }



	//changed void to response and added return
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): Response
    {
		return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }








    
    #[Route("/forgetpassword", name:"forgotten_password")]
     
    public function forgottenPass(Request $request, UserRepository $usersRepo, TokenGeneratorInterface $tokenGenerator){
        // On crée le formulaire
        $form = $this->createForm(ResetPassType::class);

        // On traite le formulaire
        $form->handleRequest($request);

        // Si le formulaire est valide
        if($form->isSubmitted() && $form->isValid()){
            // On récupère les données
            $donnees = $form->getData();

            // On cherche si un utilisateur a cet email
            $user = $usersRepo->findOneByEmail($donnees['Email']);

            // Si l'utilisateur n'existe pas
            if(!$user){
                // On envoie un message flash
                $this->addFlash('danger', 'Cette adresse n\'existe pas');

                return $this->redirectToRoute('app_login');
            }

            // On génère un token
            $token = $tokenGenerator->generateToken();

            try{
                $user->setResetToken($token);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
            }catch(\Exception $e){
                $this->addFlash('warning', 'Une erreur est survenue : '. $e->getMessage());
                return $this->redirectToRoute('app_login');
            }

            // On génère l'URL de réinitialisation de mot de passe
            $url = $this->generateUrl('app_reset_password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);
            $loader = new FilesystemLoader('../templates');
            $twig = new Environment($loader);
            $html = $twig->render('email/confirmResetPassword.html.twig', [
              'url' => $url,
          ]);
            $email = (new Email())
            ->from('athlontn@gmail.com') 
            ->to($user->getEmail())
            ->subject('Mot de passe oublié')
            ->html($html); 
            $transport = new GmailSmtpTransport('athlontn@gmail.com','vbmcqlujlyxnftax');
            $mailer = new Mailer($transport);
            $mailer->send($email); 
          
            // On crée le message flash
            $this->addFlash('message', 'Un e-mail de réinitialisation de mot de passe vous a été envoyé');

         
        }

        // On envoie vers la page de demande de l'e-mail
        return $this->render('security/forgotten_password.html.twig', ['emailForm' => $form->createView()]);
    }


     
      #[Route("/reset-password/{token}", name:"app_reset_password") ]
     
    public function resetPassword($token, Request $request, ManagerRegistry $doctrine){
        // On cherche l'utilisateur avec le token fourni
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy( array('reset_token' => $token) );
         // $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(['reset_token' => $token]);

        if(!$user){
            $this->addFlash('danger', 'Token inconnu');
            return $this->redirectToRoute('app_login');
        }
        $form = $this->createForm(ResetPasswordType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('app_login');
    }
    return $this->render('security/reset_password.html.twig', [
        'controller_name' => 'SecurityController',
        'form' => $form->createView()
    ]);
}

}
