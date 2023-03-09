<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\Security;
use Knp\Component\Pager\PaginatorInterface;
use Captcha\Bundle\CaptchaBundle\Validator\Constraints\ValidCaptcha;
use Gregwar\CaptchaBundle\Type\CaptchaType;
use Dompdf\Dompdf;




#[Route('/article')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'app_article_index', methods: ['GET'])]
    public function index(Request $request, ArticleRepository $articleRepository): Response
    {
       
        $donnees = $articleRepository->findAll();

    
        return $this->render('article/index2.html.twig', [
            'articles' => $donnees,
        ]);
    
    
    }
    

    #[Route('/recherche', name: 'app_article_recherche', methods: ['GET'])]
    public function index4(Request $request, ArticleRepository $articleRepository): Response
    {
        $query = $request->query->get('q');

        $results = $articleRepository->findByAuteur($query); // Remplacez "searchByTitle" par la méthode que vous utilisez pour rechercher les cours

        return $this->render('article/index2.html.twig', [
            'articles' => $results,
            'query' => $query,
           
        ]);
    }
    
    #[Route('/tri_titre', name: 'app_article_tri_titre', methods: ['GET'])]
    public function index2(Request $request, ArticleRepository $articleRepository): Response
    {
        $searchTerm = $request->query->get('search');
        $articles = $articleRepository->findByTitle($searchTerm);
    
        return $this->render('article/index2.html.twig', [
            'articles' => $articles,
        ]);
            
        
    }  
      



    #[Route('/new', name: 'app_article_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ArticleRepository $articleRepository): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $form->get('imgArticle')->getData();

            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('media'),
                    $fileName
                );
                $article->setImgArticle($fileName);
            }




            $articleRepository->save($article, true);

            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/new.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_article_show', methods: ['GET'])]
    public function show2(Article $article): Response
    {
        return $this->render('article/show2.html.twig', [
            'article' => $article,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_article_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Article $article, ArticleRepository $articleRepository): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('imgArticle')->getData();

            if ($file) {
                $fileName = uniqid().'.'.$file->guessExtension();
                $file->move(
                    $this->getParameter('media'),
                    $fileName
                );
                $article->setImgArticle($fileName);
            }

            $articleRepository->save($article, true);

            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_article_delete', methods: ['POST'])]
    public function delete(Request $request, Article $article, ArticleRepository $articleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $articleRepository->remove($article, true);
        }

        return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/stats', name: 'app_article_stats', methods: ['GET'])]
public function stats(ArticleRepository $articleRepository): Response
{
    $stats = $articleRepository->getAuthorStats();
    return $this->render('article/stats.html.twig', [
        'stats' => $stats,
    ]);
}


 #[Route("/like/{id}/{type}", name:"app_testfront_like")]
 
public function like(Request $request, Article $article, $type)
{
    if ($type == 'like') {
        $article->setLikes($article->getLikes() + 1);
    } else {
        $article->setDislikes($article->getDislikes() + 1);
    }

    $this->getDoctrine()->getManager()->flush();

    return $this->redirectToRoute('app_testfront_details', ['id' => $article->getId()]);
}

public function yourAction(Security $security, $id)
{
    // Get the current user
    $user = $security->getUser();

    // ...

    // Render the template and pass the user variable to it
    return $this->render('article/details.html.twig', [
        'user' => $user,
        'article' => $article,
    ]);


// ...
}

public function genererPdf()
{
    // Créer une instance de Dompdf
    $dompdf = new Dompdf();

    // Récupérer le contenu HTML à convertir en PDF
    $html = $this->renderView('article/details.html.twig', [
        'variable' => $value,
    ]);

    // Ajouter le contenu HTML à Dompdf
    $dompdf->loadHtml($html);

    // Générer le PDF
    $dompdf->render();

    // Récupérer le contenu du PDF généré
    $pdfContent = $dompdf->output();

    // Créer une réponse HTTP avec le contenu du PDF
    $response = new Response($pdfContent);

    // Définir l'en-tête Content-Type pour indiquer que la réponse est un PDF
    $response->headers->set('Content-Type', 'application/pdf');

    // Optionnel : définir un nom de fichier pour le téléchargement
    $response->headers->set('Content-Disposition', 'attachment;filename="mon_fichier.pdf"');

    // Retourner la réponse
    return $response;
}





}