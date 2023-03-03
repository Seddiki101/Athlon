<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Produit;
use App\Entity\Comments;
use App\Entity\Categorie;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\CategorieRepository;
use App\Repository\ProduitRepository;
use App\Form\ProduitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Psr\Log\LoggerInterface;
use App\Form\CommentsType;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;




 
class ProduitController extends AbstractController
{
    private $entityManager;
    #[Route('/manager', name: 'app_manager')]
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/Produit', name: 'app_Produit')]
    public function index(): Response
    {
        return $this->render('Produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    #[Route('/Produitaff', name: 'afficher')]
    public function afficher(ManagerRegistry $em): Response
    {
        $repo=$em->getRepository(Produit::class);
        $result=$repo->findAll();
        return $this->render ('produit/afficherproduit.html.twig',['Produit'=>$result]);
   
    }
    
    
    #[Route('/detaille/{id}', name: 'detaille')]
    public function detaille($id,ManagerRegistry $mg, Produit $Produit, Request $request,LoggerInterface $logger): Response
    {
        $repo=$mg->getRepository(Produit::class);
        $resultat = $repo ->find($id);
        $logger->info("The array is: " . json_encode($resultat));

        // Partie commentaires
        // On crée le commentaire "vierge"
        $comment = new Comments;

        // On génère le formulaire
        $commentForm = $this->createForm(CommentsType::class, $comment);

        $commentForm->handleRequest($request);
 // Traitement du formulaire
 if($commentForm->isSubmitted() && $commentForm->isValid()){
    $comment->setCreatedAt(new DateTime());
    $comment->setProduits($Produit);

     // On récupère le contenu du champ parentid
     $parentid = $commentForm->get("parentid")->getData();

         // On va chercher le commentaire correspondant
         $em = $this->getDoctrine()->getManager();
         if($parentid != null){
            $parent = $em->getRepository(Comments::class)->find($parentid);
        }

        // On définit le parent
        $comment->setParent($parent ?? null);
         $em->persist($comment);
         $em->flush();
         $this->addFlash('message', 'Votre commentaire a été bien envoyé');
            return $this->redirectToRoute('detaille', ['id' => $id]);


 }
 
        return $this->render('produit/readmore.html.twig', [
            'Produit' => $resultat,
            
            'commentForm' => $commentForm->createView()
        ]);
    
}

    #[Route('/Menuaff', name: 'Menuafficher')]
    public function afficherMenu(ManagerRegistry $em): Response
    {
        $repo=$em->getRepository(Produit::class);
        $result=$repo->findAll();
        return $this->render ('produit/menu.html.twig');
   
    }

    #[Route('/ProduitFront/afficher', name: 'app_front')]
    public function afficheFront(ProduitRepository $annoncesRepo, Request $request,EntityManagerInterface $em): Response
    {
        // On définit le nombre d'éléments par page
        $limit = 3;
         // On récupère le numéro de page
         $page = (int)$request->query->get("page", 1);
         $Produit = $annoncesRepo->getPaginatedAnnonces($page, $limit)
         ;
          // On récupère le nombre total d'annonces
        $total = $annoncesRepo->getTotalProduits();


    return $this->render('produit/affichFront.html.twig',[
            'Produit'=> $Produit,
            'total'=> $total,
            'limit' => $limit,
            'page' =>$page 
        ]);
       
    }

     #[Route('/Produit/add', name: 'ProduitAdd')]
    public function add(ManagerRegistry $doctrine,Request $request,SluggerInterface $slugger): Response
    
    {
        $Produit=new Produit() ;
        $form=$this->createForm(ProduitType::class,$Produit); 
        $form->handleRequest($request);
        if( $form->isSubmitted()    )  { 

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
                $Produit->setImage($newFilename);
            }
        $em=$doctrine->getManager();
        $em->persist($Produit); 
        $em->flush(); 
        return $this->redirectToRoute('afficher');
        }
        return $this->render('Produit/addP.html.twig', array("formProduit"=>$form->createView()));

       
   
    }



    #[Route('/Produit/update/{id}', name: 'update')]

    public function  updateProduit (ManagerRegistry $doctrine,$id,  Request  $request,SluggerInterface $slugger) : Response
    { $Produit = $doctrine
        ->getRepository(Produit::class)
        ->find($id);
        $form = $this->createForm(ProduitType::class, $Produit);
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
                $Produit->setImage($newFilename);
            }
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render('Produit/addP.html.twig', array("formProduit"=>$form->createView()));



    } 

    #[Route('/Produit/delete/{id}', name: 'delete')]

    public function delete($id, ManagerRegistry $doctrine)
    {$c = $doctrine
        ->getRepository(Produit::class)
        ->find($id);
        $em = $doctrine->getManager();
        $em->remove($c);
        $em->flush() ;
        return $this->redirectToRoute('afficher');
    }


    #[Route('/category/{id}', name: 'category_articles')]
    public function articles(Categorie $category): Response
    {
        $articles = $category->getProduits();
        return $this->render('categorie/listeP.html.twig', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }

   /* #[Route('/filtreP', name: 'app_filtre')]
   
    public function filterByPrice(Request $request,ProduitRepository $annoncesRepo,EntityManagerInterface $em): Response
    {
        $page = (int)$request->query->get("page", 1);
        $limit = 2;
        
        $total = $annoncesRepo->getTotalProduits();
        $minPrix = $request->query->get('min_prix');
        $maxPrix = $request->query->get('max_prix');
        
        $queryBuilder = $em->createQueryBuilder();
        $queryBuilder
        ->select('p')
        ->from(Produit::class, 'p')
        ->where('p.prix BETWEEN :min_prix AND :max_prix')
        ->setParameter('min_prix', $minPrix)
        ->setParameter('max_prix', $maxPrix);

$query = $queryBuilder->getQuery();
    dump($query); // Vérifier la requête SQL générée

    $Produit = $query->getResult();
     
        return $this->render('produit/affichFront.html.twig', [
            'Produit'=> $Produit,
            'total'=> $total,
            'limit' => $limit,
            'page' =>$page 
        ]);
      }  
*/

#[Route('/filtreP', name: 'app_filtre')]
      public function filtre(ProduitRepository $productRepository ,Request $request)
    {
        $page = (int)$request->query->get("page", 1);
        $limit = 2;
        
        $total = $productRepository ->getTotalProduits();
        $minPrice = $request->query->get('min_price');
        $maxPrice = $request->query->get('max_price');

        $Produit = $productRepository->findByPriceRange($minPrice, $maxPrice);

        return $this->render('produit/affichFront.html.twig', [
            'Produit' => $Produit,
            'total'=> $total,
            'limit' => $limit,
            'page' =>$page 
        ]);
    }

      #[Route("/like/{id}/{type}", name:"app_testfront_like")]
 
public function like(Request $request, Produit $Produit, $type)
{
    if ($type == 'like') {
        $Produit->setLikes($Produit->getLikes() + 1);
    } else {
        $Produit->setDislikes($Produit->getDislikes() + 1);
    }

    $this->getDoctrine()->getManager()->flush();

    return $this->redirectToRoute('detaille', ['id' => $Produit->getId()]);
}
   

}
