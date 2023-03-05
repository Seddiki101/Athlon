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
use App\Services\QrcodeService;
use Endroid\QrCode\Builder\BuilderInterface;
use Endroid\QrCodeBundle\Response\QrCodeResponse;
use App\Controller\SearchType;
use Endroid\QrCode\Factory\QrCodeFactoryInterface;
use DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Label\Font\NotoSans;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;



 
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




#[Route('/stat', name: 'stat', methods: ['GET'])]
    public function Produitstats(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $entityManager->getRepository(Produit::class);
    
        // Count total number of Produits
        $totalProduits = $repository->createQueryBuilder('c')
            ->select('COUNT(c.id)')
            ->getQuery()
            ->getSingleScalarResult();
    
        // Query for all RendezVouss and group them by Produit
        $query = $repository->createQueryBuilder('c')
            ->select('c.brand as brand, COUNT(c.id) as count, COUNT(c.id) / :total * 100 as percentage')
            ->setParameter('total', $totalProduits)
            ->groupBy('c.brand')
            ->getQuery();
    
        $Produits = $query->getResult();
    
        
    
        // Calculate the counts array
        $counts = [];
        foreach ($Produits as $Produit) {
            $counts[$Produit['brand']] = $Produit['count'];
        }
    
        return $this->render('Produit/stats.html.twig', [
            'Produits' => $Produits,
            'counts' => $counts,
        ]);
    }



    #[Route('/afficherjson', name: 'json')]

    public function affichercoachjson(ManagerRegistry $mg,NormalizerInterface $normalizer): Response
    {
        $repo=$mg->getRepository(Produit::class);
        $resultat = $repo ->FindAll();
        $ProduitNormalises=$normalizer->normalize($resultat,'json',['groups'=>"Produit"]);
        $json=json_encode($ProduitNormalises);
        return new Response ($json);
    }


    #[Route('/ajoutjson', name: 'ajoutjson')]
    public function ajoutjson(ManagerRegistry $doctrine,Request $request,NormalizerInterface $normalizer): Response
    {
        $Produit =new Produit();
        
        $brand=$request->query->get('brand');
        $description=$request->query->get('description');
        $prix=$request->query->get('prix');
        $image=$request->query->get('image');
        $nom=$request->query->get('nom');
       
        $em=$doctrine->getManager();


 $Produit->setBrand($brand);
 $Produit->setDescription($description);
 $Produit->setPrix(floatval($prix));
 $Produit->setImage($image);
 $Produit->setNom($nom);
        
       

        $em->persist($Produit);
        $em->flush();

        $serializer =new Serializer([new ObjectNormalizer()]);
        $formatted=$serializer->normalize($Produit);

        return new JsonResponse ($formatted);
    }

 /* #[Route('/updatejson/{id}', name: 'updatejson')]

    public function updatejson(Request $req, $id, NormalizerInterface $Normalizer)
    {
               $em = $this->getDoctrine()->getManager();
               $Produit= $em->getRepository(Produit::class)->find($id);
               $Produit->setBrand('brand');
               $Produit->setDescription('description');
               $Produit->setPrix(floatval('prix'));
               $Produit->setImage('image');
               $Produit->setNom('nom');
                      
              $em->persist($Produit);
               $em->flush();
               $jsonContent=$Normalizer->normalize($Produit, 'json', ['groups' => 'Produits']);
return new Response("Produitupdated successfully" .json_encode ($jsonContent));
    }*/


    #[Route('/updatejson/{id}', name: 'updatejson')]
public function updatejson(Request $req, $id, NormalizerInterface $Normalizer)
{
    $em = $this->getDoctrine()->getManager();
    $Produit = $em->getRepository(Produit::class)->find($id);
    
    $nom = $req->get('nom');
    $description = $req->get('description');
    $brand = $req->get('brand');
    $prix = $req->get('prix');
    $image = $req->get('image');

    // Set the updated values in the entity
    if ($nom) {
        $Produit->setNom($nom);
    }
    if ($description) {
        $Produit->setDescription($description);
    }
    if ($brand) {
        $Produit->setBrand(intval($brand));
    }
    if ($prix) {
        $Produit->setPrix(floatval($prix));
    }
    if ($image) {
        $Produit->setImage($image);
    }

    $em->persist($Produit);
    $em->flush();

    $jsonContent = $Normalizer->normalize($Produit, 'json', ['groups' => 'Produits']);
    return new Response("Produit updated successfully" . json_encode($jsonContent));
}

    



    #[Route('/deletejson/{id}', name: 'deletejson')]

    public function deletejson(Request $request, $id,NormalizerInterface $Normalizer)
    {           $id=$request->get('id');
               $em = $this->getDoctrine()->getManager();
               $Produit= $em->getRepository(Produit::class)->find($id);
               

                $em->remove($Produit);
                $em->flush();

            
               $jsonContent=$Normalizer->normalize($Produit, 'json', ['groups' => 'Produits']);
        return new Response("Produit deleted successfully" .json_encode ($jsonContent));
    }

    #[Route('/qr-codes', name: 'app_qr_codes')]
    public function QRcode(UrlGeneratorInterface $urlGenerator): Response
    {

        $id= 42;
        $detailleUrl = $urlGenerator->generate('detaille', ['id' => $id], UrlGeneratorInterface::ABSOLUTE_URL);
      
        $writer = new PngWriter();
        $qrCode = QrCode::create($detailleUrl)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(120)
            ->setMargin(0)
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));
        $logo = Logo::create('assets/img/logo.png')
            ->setResizeToWidth(60);
        $label = Label::create('')->setFont(new NotoSans(8));
 
        $qrCodes = [];
        $qrCodes['img'] = $writer->write($qrCode, $logo)->getDataUri();
        $qrCodes['simple'] = $writer->write(
                                $qrCode,
                                null,
                                $label->setText('Simple')
                            )->getDataUri();
 
        $qrCode->setForegroundColor(new Color(255, 0, 0));
        $qrCodes['changeColor'] = $writer->write(
            $qrCode,
            null,
            $label->setText('Color Change')
        )->getDataUri();
 
        $qrCode->setForegroundColor(new Color(0, 0, 0))->setBackgroundColor(new Color(255, 0, 0));
        $qrCodes['changeBgColor'] = $writer->write(
            $qrCode,
            null,
            $label->setText('Background Color Change')
        )->getDataUri();
 
        $qrCode->setSize(200)->setForegroundColor(new Color(0, 0, 0))->setBackgroundColor(new Color(255, 255, 255));
        $qrCodes['withImage'] = $writer->write(
            $qrCode,
            $logo,
            $label->setText('With Image')->setFont(new NotoSans(20))
        )->getDataUri();
 
        return $this->render('produit/qr.html.twig',  $qrCodes) ;
    }
// ...
}

