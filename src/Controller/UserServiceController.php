<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;


class UserServiceController extends AbstractController
{
    #[Route('/userService', name: 'app_user_service')]
    public function index(): Response
    {
        return $this->render('user_service/index.html.twig', [
            'controller_name' => 'UserServiceController',
        ]);
    }
	
	
	
	
		///////////////////////////////////////////////////LOGIN////////////////////////////////////////////////////////////


	#[Route("/signin", name: "app_service_login")]
    public function siginAction(Request $request, NormalizerInterface $normalizer)
    {
        $Email = $request->query->get("email");
        $Password = $request->query->get("password");

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findOneBy(['email' => $Email]);

        if ($user) {
            if ($Password == $user->getPassword()) {
                $userlogin = $normalizer->normalize($user, 'json', ['groups' => "uzer"]);
                $json = json_encode($userlogin);
                return new JsonResponse($json);
            } else {
                return new Response("password not found", 500);
            }
        } 	else {
            return new Response("user not found", 400);
			}
    }













    /*
	public function loginAction(Request $request)
    {
        $username = $request->query->get("username");
        $password = $request->query->get("password");
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(\AppBundle\Entity\User::class)->findOneBy(['username' => $username]);
        // $user->setPlainPassword($user->getPlainPassword());
        if($user==null) {

        }
        if ($user) {
            if (password_verify($password, $user->getPassword())) {
                $serializer = new Serializer([new ObjectNormalizer()]);
                $formatted = $serializer->normalize($user);
                return new JsonResponse($formatted);
            } else {
                return new Response("failed");
            }
        } else {
            return new Response("failed");
        }

    }
	
	*/
	
	
	
	
	///////////////////////////////////////////////////REGISTER////////////////////////////////////////////////////////////
	/*
	    public function registerAction(Request $request) {
        $username = $request->query->get("username");
        $password = $request->query->get("password");
        $email = $request->query->get("email");
        $role = $request->query->get("roles");
        $cin = $request->query->get("cin");

        $user = new User();
        $user->setPlainPassword($password);
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setCin(26555555);
        $user->setRoles(array($role));
        $user->setEnabled(true);

        try {

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return new Response("success");
        } catch (Exception $ex) {
            return new Response("fail");
        }
    }
*/	
	
	
	
	
	
	
	
	
	
	
	

	
	
	///////////////////////////////////////////////////Affichage liste////////////////////////////////////////////////////////////
	#[Route("/AllUserService", name: "listUserS")]
	public function getUsers(UserRepository $repo, SerializerInterface $serializer)
    {
		$lista = $repo->findAll();
		$json = $serializer->serialize($lista, 'json', ['groups' => "uzers"]);
		    return new Response($json);
    }
	
	///////////////////////////////////////////////////find one////////////////////////////////////////////////////////////
	
	    #[Route("/userService/{id}", name: "userServiceID")]
    public function UserId($id, NormalizerInterface $normalizer, UserRepository $repo)
    {
        $usr = $repo->find($id);
        $usrNormalises = $normalizer->normalize($usr, 'json', ['groups' => "uzers"]);
        return new Response(json_encode($usrNormalises));
    }

	///////////////////////////////////////////////////Ajout////////////////////////////////////////////////////////////

    #[Route("addUserJSON/new", name: "addUserJSON")]
    public function addUserJSON(Request $req,   NormalizerInterface $Normalizer)
    {

        $em = $this->getDoctrine()->getManager();
        $usr = new User();
		
		
        $usr->setNom($req->get('nom'));
		$usr->setPrenom($req->get('prenom'));
        $usr->setEmail($req->get('email'));
		//might need to encrypt it
		$usr->setPassword( $req->get('password') );
		 
		 $usr->setDateins(new \DateTime('now')) ;
         $usr->setRoles((["ROLE_USER"])) ;
		
        $em->persist($usr);
        $em->flush();

        $jsonContent = $Normalizer->normalize($usr, 'json', ['groups' => 'uzers']);
        return new Response(json_encode($jsonContent));
    }
	
	///////////////////////////////////////////////////Edition////////////////////////////////////////////////////////////

    #[Route("updateUserJSON/{id}", name: "updateUserJSON")]
    public function updateUserJSON(Request $req, $id, NormalizerInterface $Normalizer)
    {

        $em = $this->getDoctrine()->getManager();
        $usr = $em->getRepository(User::class)->find($id);
        $usr->setNsc($req->get('nsc'));
        $usr->setEmail($req->get('email'));

        $em->flush();

        $jsonContent = $Normalizer->normalize($usr, 'json', ['groups' => 'uzers']);
        return new Response("User updated successfully " . json_encode($jsonContent));
    }

		
		///////////////////////////////////////////////////Suppression////////////////////////////////////////////////////////////
		

    #[Route("deleteUserJSON/{id}", name: "deleteUserJSON")]
    public function deleteUserJSON(Request $req, $id, NormalizerInterface $Normalizer)
    {

        $em = $this->getDoctrine()->getManager();
        $usr = $em->getRepository(User::class)->find($id);
        $em->remove($usr);
        $em->flush();
        $jsonContent = $Normalizer->normalize($usr, 'json', ['groups' => 'uzers']);
        return new Response("User deleted successfully " . json_encode($jsonContent));
    }
	
	
	
	
	
	
	
	
	
}
