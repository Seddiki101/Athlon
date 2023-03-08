<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Repository\ReclamationRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;


class ReclamationServiceController extends AbstractController
{
 
#[Route("/AllRecs", name: "list")]

    public function getReclamations(ReclamationRepository $repo, SerializerInterface $serializer)
    {
        $lista = $repo->findAll();

        $json = $serializer->serialize($lista, 'json', ['groups' => "reclamations"]);

        return new Response($json);
    }

    #[Route("/recs/{id}", name: "recs")]
    public function ReclamationId($id, NormalizerInterface $normalizer, ReclamationRepository $repo)
    {
        $student = $repo->find($id);
        $studentNormalises = $normalizer->normalize($student, 'json', ['groups' => "reclamations"]);
        return new Response(json_encode($studentNormalises));
    }


    #[Route("addReclamationJSON/new", name: "addReclamationJSON")]
    public function addReclamationJSON(Request $req,   NormalizerInterface $Normalizer)
    {

        $em = $this->getDoctrine()->getManager();
        $student = new Reclamation();
        $student->setNsc($req->get('titre'));
        $student->setEmail($req->get('desipticon'));
        $em->persist($student);
        $em->flush();

        $jsonContent = $Normalizer->normalize($student, 'json', ['groups' => 'reclamations']);
        return new Response(json_encode($jsonContent));
    }

    #[Route("updateReclamationJSON/{id}", name: "updateReclamationJSON")]
    public function updateReclamationJSON(Request $req, $id, NormalizerInterface $Normalizer)
    {

        $em = $this->getDoctrine()->getManager();
        $student = $em->getRepository(Reclamation::class)->find($id);
        $student->setNsc($req->get('titre'));
        $student->setEmail($req->get('desipticon'));

        $em->flush();

        $jsonContent = $Normalizer->normalize($student, 'json', ['groups' => 'reclamations']);
        return new Response("Student updated successfully " . json_encode($jsonContent));
    }

    #[Route("deleteReclamationJSON/{id}", name: "deleteReclamationJSON")]
    public function deleteReclamationJSON(Request $req, $id, NormalizerInterface $Normalizer)
    {

        $em = $this->getDoctrine()->getManager();
        $student = $em->getRepository(Reclamation::class)->find($id);
        $em->remove($student);
        $em->flush();
        $jsonContent = $Normalizer->normalize($student, 'json', ['groups' => 'reclamations']);
        return new Response("Student deleted successfully " . json_encode($jsonContent));
    }
 
}
