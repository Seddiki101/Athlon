<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;
use Doctrine\Persistence\ManagerRegistry;
use App\RepositoryCategorieRepository;
use App\Form\CategorieType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'app_categorie')]
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }

    #[Route('/Categorieaff', name: 'afficherCat')]
    public function afficherCategorie(ManagerRegistry $em): Response
    {
        $repo=$em->getRepository(Categorie::class);
        $result=$repo->findAll();
        return $this->render ('categorie/listeCat.html.twig',['Categorie'=>$result]);
   
    }
    #[Route('/CategorieFrontaff', name: 'afficherFrontCat')]
    public function afficherFrontCategorie(ManagerRegistry $em): Response
    {
        $repo=$em->getRepository(Categorie::class);
        $result=$repo->findAll();
        return $this->render ('categorie/afficherCatFront.html.twig',['Categorie'=>$result]);
   
    }

    #[Route('/Categorie/add', name: 'CategorieAdd')]
    public function addCategorie(ManagerRegistry $doctrine,Request $request,SluggerInterface $slugger): Response
    
    {
        $Categorie=new Categorie() ;
        $form=$this->createForm(CategorieType::class,$Categorie); 
        $form->handleRequest($request);
        if( $form->isSubmitted() )  {
            $brochureFile = $form->get('image')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('produit_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $Categorie->setImage($newFilename);
            }
        $em=$doctrine->getManager();
        $em->persist($Categorie); 
        $em->flush(); 
        return $this->redirectToRoute('afficherCat');
        }
        return $this->render('categorie/addCat.html.twig', array("formCategorie"=>$form->createView()));
       
   
    }

    #[Route('/Categorie/update/{id}', name: 'updateCat')]

    public function  updateCategorie (ManagerRegistry $doctrine,$id,  Request  $request,SluggerInterface $slugger) : Response
    { $Categorie = $doctrine
        ->getRepository(Categorie::class)
        ->find($id);
        $form = $this->createForm(CategorieType::class, $Categorie);
        $form->add('update', SubmitType::class) ;
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {

            $brochureFile = $form->get('image')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('produit_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $Categorie->setImage($newFilename);
            }
             $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('afficherCat');
        }
        return $this->render('categorie/addCat.html.twig', array("formCategorie"=>$form->createView()));


    } 


    #[Route('/Categorie/delete/{id}', name: 'deleteCat')]

    public function delete($id, ManagerRegistry $doctrine)
    {$c = $doctrine
        ->getRepository(Categorie::class)
        ->find($id);
        $em = $doctrine->getManager();
        $em->remove($c);
        $em->flush() ;
        return $this->redirectToRoute('afficherCat');
    }
   


    
}
