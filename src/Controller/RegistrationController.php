<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Address;
 use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use App\Repository\UserRepository;
use Symfony\Component\Mailer\MailerInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use SymfonyCasts\Bundle\VerifyEmail\Controller\VerifyEmailControllerTrait;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class RegistrationController extends AbstractController
{

    private EmailVerifier $emailVerifier;
    private $verifyEmailHelper;
    private $mailer;

    public function __construct(EmailVerifier $emailVerifier,VerifyEmailHelperInterface $helper, MailerInterface $mailer)
    {
        $this->emailVerifier = $emailVerifier;
        $this->verifyEmailHelper = $helper;
        $this->mailer = $mailer;
    }


    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginFormAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
			
			            $user->setDateins(new \DateTime('now')) ;
                        $user->setRoles((["ROLE_USER"])) ;
			
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            /*
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('athlontn@gmail.com', 'Athlon_mail_bot'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            */

            //mail
            $signatureComponents = $this->verifyEmailHelper->generateSignature(
                'registration_confirmation_route',
                $user->getId(),
                $user->getEmail()
            );

            /*
            $email = new TemplatedEmail();
            $email->from('athlontn@gmail.com');
            $email->to($user->getEmail());
            $email->htmlTemplate('registration/confirmation_email.html.twig');
            $email->context(['signedUrl' => $signatureComponents->getSignedUrl()]);
            $this->mailer->send($email);
            */


            $loader = new FilesystemLoader('../templates');
            $twig = new Environment($loader);
            $html = $twig->render('registration/confirmation_email.html.twig', ['signedUrl' => $signatureComponents->getSignedUrl()]);

            $email = (new Email())
                ->from('athlontn@gmail.com')
                ->to($user->getEmail())
                ->subject('Verfification mail')
                ->html($html);



            $transport = new GmailSmtpTransport('athlontn@gmail.com','vbmcqlujlyxnftax');
            $mailer = new Mailer($transport);
            $mailer->send($email);
            //mail


            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }






    #[Route('/verify', name: 'registration_confirmation_route')]
    public function verifyUserEmail(Request $request , EntityManagerInterface $entityManager,UserRepository $userRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        // Do not get the User's Id or Email Address from the Request object
        try {
            $this->verifyEmailHelper->validateEmailConfirmation($request->getUri(), $user->getId(), $user->getEmail());
        } catch (VerifyEmailExceptionInterface $e) {
            $this->addFlash('verify_email_error', $e->getReason());

            return $this->redirectToRoute('app_register');
        }

        // Mark your user as verified. e.g. switch a User::verified property to true
        $user->setIsVerified(true);
        $userRepository->save($user, true);
        //$entityManager->persist($user);
        //$entityManager->flush();


        $this->addFlash('success', 'Your e-mail address has been verified.');

        return $this->redirectToRoute('app_home');
    }


    /*
         #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_home');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_home');
    }
    */
}
