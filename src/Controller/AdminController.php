<?php

namespace App\Controller;

use App\Entity\Access;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\State;
use App\Entity\Thematic;
use App\Entity\User;
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
        $article = $articleRepo->findAll();
        $categoryRepo = $this->getDoctrine()->getRepository(Category::class);
        $categories = $categoryRepo->findAll();

        //Gestion des filtres

        // Recupération de la recherche par nom
        $nameArticle = $request->get("search_by_name");
        //Recupération de la recherche par catégorie
        $nameCategory = $request->get("search_by_category");
        // Recupération choix btn radio
        $accessFilter = $request->get("search_by_access");

        // Recupération choix checkboxs Thématique
        // checkbox cochée
        $mutuelleFilter = $request->get("search_by_them_1") == 'on';
        $mutuelle = 0;
        // si coché assigne la valeur 1 à $mutuelle ( on doit pourvoir passer autrement pour récupérer article.thLabel = 1
        if ($mutuelleFilter) {
            $mutuelle = 1;
        }
        $prevoyanceFilter = $request->get("search_by_them_2") == 'on';
        $prevoyance = 0;
        if ($prevoyanceFilter) {
            $prevoyance = 2;
        }
        $epargneFilter = $request->get("search_by_them_3") == 'on';
        $epargne = 0;
        if ($epargneFilter) {
            $epargne = 3;
        }
        $retraiteFilter = $request->get("search_by_them_4") == 'on';
        $retraite = null;
        if ($retraiteFilter) {
            $retraite = 4;
        }
        $impotFilter = $request->get("search_by_them_5") == 'on';
        $impot = null;
        if ($impotFilter) {
            $impot = 5;
        }
        $successionFilter = $request->get("search_by_them_6") == 'on';
        $succession = null;
        if ($successionFilter) {
            $succession = 6;
        }
        $autresFilter = $request->get("search_by_them_7") == 'on';
        $autres = null;
        if ($autresFilter) {
            $autres = 7;
        }
        //Recupération choix des dates
        $date1 = $request->get("search_by_creationDate");
        $date2 = $request->get("search_by_expDate");

        //Passage des données à la fonction gérant la requête SQL
        $articles = $articleRepo->findByFilter($nameArticle, $nameCategory, $accessFilter, $date1, $date2, $mutuelle, $prevoyance, $epargne, $retraite,
            $impot, $succession, $autres);


        return $this->render('admin/listArticle.html.twig', [

            "articles" => $articles, "categories" => $categories, "nameArticle" => $nameArticle, "nameCategory" => $nameCategory,
            "article" => $article, "accessFilter" => $accessFilter, "date1" => $date1, "date2" => $date2, "mutuelle" => $mutuelle, "mutuelleFilter" => $mutuelleFilter,
            "prevoyance" => $prevoyance, "prevoyanceFilter" => $prevoyanceFilter, "epargne" => $epargne, "epargneFilter" => $epargneFilter, "retraite" => $retraite, "retraiteFilter" => $retraiteFilter,
            "impot" => $impot, "impotFilter" => $impotFilter, "succession" => $succession, "successionFilter" => $successionFilter, "autres" => $autres, "autresFilter" => $autresFilter
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
        $admin = $this->getUser();


        //Création du formulaire
        $newArticleForm = $this->createForm(ArticleType::class, $article);
        $newArticleForm->handleRequest($request);

        //Vérification de la soumission du formulaire
        if ($newArticleForm->isSubmitted() && $newArticleForm->isValid()) {




            /**@var UploadedFile $ArtImageFile */

            $artImg = $newArticleForm->get('ArtImg')->getData();


            // Img n'est pas en required, donc s'effectue seulement si une image est upload
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

            //gestion des dates

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

            if ($newArticleForm->get('annuler')->isClicked()) {
                return $this->redirectToRoute('homeback');
            }
        }

        //Passage du formulaire à la vue twig
        return $this->render("/admin/creatingArticle.html.twig", [

            "article" => $article,
            "newArticleForm" => $newArticleForm->createView()
        ]);
    }

    /**
     * @Route("/admin/preview_article/{id}", name="preview_article", requirements={"id":"\d+"}, methods={"GET","POST"})
     */
    public function previewArticle($id)
    {
        //Récupération de l'instance de repository
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepo->find($id);


        return $this->render("admin/previewArticle.html.twig", [
            "article" => $article
        ]);
    }

    /**
     * @Route ("/admin/edit_article/{id}", name="edit_article", requirements={"id":"\d+"}, methods={"GET", "POST"})
     */
    public function editArticle($id, EntityManagerInterface $em, Request $request, SluggerInterface $slugger)
    {
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepo->find($id);
        $state = $article->getState();
        $artImg = $article->getArtImg();

        //Création du formulaire
        $editArticleForm = $this->createForm(ArticleType::class, $article);
        $editArticleForm->handleRequest($request);

        //Test si formulaire soumis et valide
        if ($editArticleForm->isSubmitted() && $editArticleForm->isValid()) {

            $artImg = $editArticleForm->get('ArtImg')->getData();


            // Img n'est pas en required, donc s'effectue seulement si une image est upload
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

            //gestion des dates

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
            if ($editArticleForm->get('enregistrer')->isClicked()) {
                $stateRepo = $this->getDoctrine()->getRepository(State::class);
                $state = $stateRepo->findOneBy(['stateLabel' => "Créé"]);
                $article->setState($state);

                //Envoi en BDD
                $em->persist($article);
                $em->flush();

                //Ajout message flash + redirection
                $this->addFlash('success', "Nouvel Article Enregistré");
                return $this->redirectToRoute('homeback');
            }

            //Si btn publier
            if ($editArticleForm->get('publier')->isClicked()) {
                $stateRepo = $this->getDoctrine()->getRepository(State::class);
                $state = $stateRepo->findOneBy(['stateLabel' => "Publié"]);
                $article->setState($state);

                $em->persist($article);
                $em->flush();

                //Ajout message flash + redirection
                $this->addFlash('success', "Nouvel Article Publié");
                return $this->redirectToRoute('homeback');
            }

            if ($editArticleForm->get('annuler')->isClicked()) {
                return $this->redirectToRoute('homeback');
            }
            return $this->redirectToRoute("homeback");
        }

        return $this->render("admin/editArticle.html.twig", [
            "article" => $article,
            "state" => $state,
            "editArticleForm" => $editArticleForm->createView()
        ]);

    }

    /**
     * @Route("/admin/publish_article/{id}", name="publish_article", requirements={"id": "\d+"}, methods={"GET","POST"})
     * @param $id
     */
    public function publishArticle($id, EntityManagerInterface $em)
    {

        // Récupération de l'article concerné
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepo->find($id);

        // Récupération de l'état "Publié" pour pouvoir l'assigné à l'article
        $stateRepo = $this->getDoctrine()->getRepository(State::class);
        $state = $stateRepo->findOneBy(['stateLabel' => "Publié"]);

        // Changement de l'état de l'article
        $article->setState($state);
        $em->persist($article);
        $em->flush();
        $this->addFlash('success', "Article publié");

        return $this->redirectToRoute("homeback");

    }

    /**
     * @Route("/admin/archive_article/{id}", name="archive_article", requirements={"id": "\d+"}, methods={"GET","POST"})
     * @param $id
     */
    public function archiveArticle($id, EntityManagerInterface $em)
    {

        // Récupération de l'article concerné
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepo->find($id);

        // Récupération de l'état "Publié" pour pouvoir l'assigné à l'article
        $stateRepo = $this->getDoctrine()->getRepository(State::class);
        $state = $stateRepo->findOneBy(['stateLabel' => "Archivé"]);

        // Changement de l'état de l'article
        $article->setState($state);
        $em->persist($article);
        $em->flush();
        $this->addFlash('success', "Article Archivé");
        return $this->redirectToRoute("homeback");

    }

    /**
     * @Route("/admin/delete_article/{id}", name="delete_article", requirements={"id": "\d+"},methods={"GET","POST"})
     */
    public function deleteArticle($id, EntityManagerInterface $em, Request $request)
    {
        //Récupération de l'article à delete
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepo->find($id);

        //Suppression de l'article
        $em = $this->getDoctrine()->getManager();
        $em->remove($article);
        $em->flush();
        $this->addFlash('success', "Article supprimé");
        return $this->redirectToRoute("homeback");
    }
}
