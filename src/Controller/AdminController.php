<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\State;
use App\Entity\Thematic;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


// Controller qui servira pour l'administration du site (articles, partenaires...)
class AdminController extends AbstractController
{

    //Controller gérant le tableau de bord
    /**
     * @Route("/admin/tableau_de_bord", name="homeback", methods={"GET","POST"})
     */
    public function index(Request $request)
    {

        // Récupération des articles
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articleRepo->findAll();


        return $this->render('admin/index.html.twig', [
            'controller_name' => 'homeback',
            "articles" => $articles
        ]);
    }


    //Controller gérant la liste des articles

    /**
     * @Route("/admin/list_article", name="listArticle", methods={"GET","POST"})
     */
    public function listArticle(Request $request)
    {

        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articleRepo->findAll();
        $categoryRepo = $this->getDoctrine()->getRepository(Category::class);
        $categories = $categoryRepo->findAll();

        //Gestion des filtres
        // Recupération de la recherche par nom
        $nameArticle = $request->get("search_by_name");

        //Recupération de la recherche par catégorie
        $nameCategory = $request->get("search_by_category");

        // Recupération choix btn radio
        $abonne = $request->get("abonne") == "on";
        $libre = $request->get("libre") == "on";
        $lesDeux = $request->get("lesDeux") == "on";

        // Recupération choix des checkboxs thématiques
        $mutuelle = $request->get("search_by_them_1") == "on";
        $prevoyance = $request->get("search_by_them_2") == "on";
        $epargne = $request->get("search_by_them_3") == "on";
        $retraite = $request->get("search_by_them_4") == "on";
        $impot = $request->get("search_by_them_5") == "on";
        $succession = $request->get("search_by_them_6") == "on";
        $autres = $request->get("search_by_them_7") == "on";

        // Recupération choix checkboxs état
        $cree = $request->get("search_by_state_1") == "on";
        $publie = $request->get("search_by_state_2") == "on";
        $archive = $request->get("search_by_state_3") == "on";

        //Recupération choix des dates
        $date1 = $request->get("search_by_creationDate");
        $date2 = $request->get("search_by_expDate");

        $articles = $articleRepo->findByFilter($nameArticle, $nameCategory, $abonne, $libre, $lesDeux, $mutuelle, $prevoyance, $epargne, $retraite, $impot,
            $succession, $autres, $cree, $publie, $archive);

        return $this->render('admin/listArticle.html.twig', [
            'controller_name' => 'homeback',
            "articles" => $articles, "nameArticle" => $nameArticle, "nameCategory" => $nameCategory, "abonne" => $abonne, "libre" => $libre, "lesDeux" => $lesDeux,
            "mutuelle" => $mutuelle, "prevoyance" => $prevoyance, "epargne" => $epargne, "impot" => $impot, "succession" => $succession, "autres" => $autres,
            "cree" => $cree, "publie" => $publie, "archive" => $archive, "date1" => $date1, "date2" => $date2, "categories" => $categories
        ]);

    }


    //Controller gérant le formulaire de Création d'un article

    /**
     * @Route("/admin/new_article", name="newArticle", methods={"GET","POST"})
     */
    public function creatingArticle(Request $request, EntityManagerInterface $em, SluggerInterface $slugger)
    {

        // Création de l'instance de l'entité Article
        $article = new Article();

        //Création du formulaire
        $newArticleForm = $this->createForm(ArticleType::class, $article);
        $newArticleForm->handleRequest($request);

        //Vérification de la soumission du formulaire
        if ($newArticleForm->isSubmitted() && $newArticleForm->isValid()) {

            $thematicRepo = $this->getDoctrine()->getRepository(Thematic::class);




            /**@var UploadedFile $ArtImageFile */

            $artImg = $newArticleForm->get('ArtImg')->getData();


            // Ime n'est pas en required, donc s'effectue seulement si une image est upload
            if ($artImg) {
                $originalFilename = pathinfo($artImg->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $artImg->guessExtension();

                //Envoi de l'image dans le bon dossier
                try {
                    $artImg->move(
                        $this->getParameter('imgUpload'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $e;
                }
                $article->setArtImg($newFilename);
            }

            $dateExp = $article->getExpDate();
            if ($dateExp < (new \DateTime('now'))) {
                $this->addFlash('error', "La date de fin d'offre ne peut pas être inférieur ou 
                égale à la date d'aujourd'hui");
            }

            $creationDate = $article->getCreationDate();
            if ($creationDate > $dateExp) {
                $this->addFlash('error', "La date de création de l'offre ne peut pas être supérieur 
                à la date de fin de l'offre");
            }

            //Si btn enregistrer
            if ($newArticleForm->get('enregistrer')->isClicked()) {
                $stateRepo = $this->getDoctrine()->getRepository(State::class);
                $state = $stateRepo->findOneBy(['stateLabel' => "Créé"]);
                $article->setState($state);

                $em->persist($article);
                $em->flush();

                //Ajout message flash + redirection
                $this->addFlash('success', "Nouvel Article Enregistré");
                return $this->redirectToRoute('homeback');
            }

            //Si btn publier
            if ($newArticleForm->get('publier')->isClicked()) {
                $stateRepo = $this->getDoctrine()->getRepository(State::class);
                $state = $stateRepo->findOneBy(['stateLabel' => "Publié"]);
                $article->setState($state);

                $em->persist($article);
                $em->flush();

                //Ajout message flash + redirection
                $this->addFlash('success', "Nouvel Article Publié");
                return $this->redirectToRoute('homeback');
            }

            //Si btn annuler
            //    if ($annuler->get('Annuler')->isClicked()) {
            //      return $this->redirectToRoute("homeback");
            //}
        }

        //Passage du formulaire à la vue twig
        return $this->render("/admin/creatingArticle.html.twig", [
            "article" => $article,
            "newArticleForm" => $newArticleForm->createView()
        ]);
    }


}
