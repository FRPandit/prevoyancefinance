<?php

namespace App\Controller;

use App\Entity\Access;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\State;
use App\Entity\Thematic;
use App\Entity\User;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\Paginator;
use Knp\Component\Pager\PaginatorInterface;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPaginationInterface;
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
    public function listArticle(Request $request, ArticleRepository $articleRepository,PaginatorInterface $paginator,EntityManagerInterface $em)
    {


       /*    $article = $articleRepo->findAll();*/
        // Permet de faire la pagination des articles
       $articlePage = $paginator->paginate(
            // Récupération de ma requête
            $articleRepository->findAll(),
            // Indique que la page par défault est la page 1
            $request->query->getInt('page' , 1),
            // Indique le nombre d'article par page
            15
        );

        $categoryRepo = $this->getDoctrine()->getRepository(Category::class);
        $categories = $categoryRepo->findAll();
        $accessRepo = $this->getDoctrine()->getRepository(Access::class);
        $thematicRepo = $this->getDoctrine()->getRepository(Thematic::class);
        $stateRepo = $this->getDoctrine()->getRepository(State::class);
        //Recupérer la collection de thématique

        //Gestion des filtres

        // Recupération de la recherche par nom
        $nameArticle = $request->get("search_by_name");
        //Recupération de la recherche par catégorie
        $nameCategory = $request->get("search_by_category");
        // Recupération choix checkbox access

        $freeFilter = $request->get("search_by_access_1") == 'on';
        $free = null;
        if($freeFilter){
            $free = $accessRepo->findOneBy(["aLabel"=>"libre"]);
        }
        $subFilter = $request->get("search_by_access_2") == 'on';
        $sub = null;
        if($subFilter){
            $sub = $accessRepo->findOneBy(["aLabel"=>"abonné"]);
        }

        // checkbox Thematics
        // Recupération choix checkboxs Thématique

        $mutualHealthFilter = $request->get("search_by_them_1") == 'on';
        $mutualHealth = null;

             // si coché assigne la valeur 1 à $mutuelle ( on doit pourvoir passer autrement pour récupérer article.thLabel = 1
             if ($mutualHealthFilter) {
                 $mutualHealth = $thematicRepo->findOneBy(['thLabel' => "Mutuelle"]);
             }
         $foresightFilter = $request->get("search_by_them_2") == 'on';
         $foresight = null;
        if($foresightFilter){
            $foresight = $thematicRepo->findOneBy(['thLabel' => "Prévoyance"]);
        }

        $savingFilter = $request->get("search_by_them_3");
        $saving = null;
        if ($savingFilter) {
            $saving = $thematicRepo->findOneBy(['thLabel' => "Epargne"]);
        }
        $retirementFilter = $request->get("search_by_them_4") == 'on';
        $retirement = null;
        if ($retirementFilter) {
            $retirement = $thematicRepo->findOneBy(['thLabel'=>'Retraite']);
        }
        $taxFilter = $request->get("search_by_them_5") == 'on';
        $tax = null;
        if ($taxFilter) {
            $tax = $thematicRepo->findOneBy(['thLabel'=>'Impôt']);
        }
        $successionFilter = $request->get("search_by_them_6") == 'on';
        $succession = null;
        if ($successionFilter) {
            $succession = $thematicRepo->findOneBy(['thLabel'=>'Succession']);
        }
        $othersFilter = $request->get("search_by_them_7") == 'on';
        $others = null;
        if ($othersFilter) {
            $others = $thematicRepo->findOneBy(['thLabel'=>'Autres']);
        }

        //Checkbox State

        $createdFilter = $request->get("search_by_state_1");
        $created=null;
        if($createdFilter){
            $created = $stateRepo->findOneBy(['stateLabel'=>'Créé']);
        }

        $publishedFilter = $request->get("search_by_state_2");
        $published = null ;
        if($publishedFilter){
            $published = $stateRepo->findOneBy(['stateLabel'=>'Publié']);
        }

        $archivedFilter = $request->get("search_by_state_3");
        $archived = null;
        if($archivedFilter){
            $archived = $stateRepo->findOneBy(['stateLabel'=>'Archivé']);
        }
            //Recupération choix des dates
        $date1 = $request->get("search_by_creationDate");
        $date2 = $request->get("search_by_expDate");



        //Passage des données à la fonction gérant la requête SQL
     $articlePage = $paginator->paginate(
      $articleRepository->findByFilter($nameArticle, $nameCategory, $free, $sub, $date1, $date2,
            $mutualHealth, $foresight, $saving, $retirement, $tax, $succession,$others,$created,$published, $archived),
        $request->query->getInt('page', 1),
        15);


        return $this->render('admin/listArticle.html.twig', [

            //     "articles" => $articles,
           "articlePage"=>$articlePage,
            "categories" => $categories,
            "nameArticle" => $nameArticle,
            "nameCategory" => $nameCategory,
            "free" => $free,
            "freeFilter"=>$freeFilter,
            "sub"=>$sub,
            "subFilter"=>$subFilter,
            "date1" => $date1,
            "date2" => $date2,
            "mutualHealthFilter" => $mutualHealthFilter,
            "mutualHealth"=>$mutualHealth,
            "foresight" => $foresight,
            "foresightFilter" => $foresightFilter,
            "saving" => $saving,
            "savingFilter" => $savingFilter,
            "retirement" => $retirement,
            "retirementFilter" => $retirementFilter,
            "taxFilter" => $taxFilter,
            "tax" => $tax,
            "succession" => $succession,
            "successionFilter" => $successionFilter,
            "others" => $others,
            "othersFilter" => $othersFilter,
            "created"=>$created,
            "createdFilter"=> $createdFilter,
            "published"=>$published,
            "publishedFilter"=>$publishedFilter,
            "archived"=>$archived,
            "archivedFilter"=>$archivedFilter

        ]);

    }


    //Controller gérant le formulaire de Création d'un article

    /**
     * @Route("/admin/new_article", name="newArticle", methods={"GET","POST"})
     */
    public function creatingArticle(Request $request, EntityManagerInterface $em, SluggerInterface $slugger)
    {
    $accessRepo = $this->getDoctrine()->getRepository(Access::class);
    $access = $accessRepo->findAll();

        // Création de l'instance de l'entité Article

        $article = new Article();
        $admin = $this->getUser();


        //Création du formulaire
        $newArticleForm = $this->createForm(ArticleType::class, $article);
        $newArticleForm->handleRequest($request);

        //Vérification de la soumission du formulaire
        if ($newArticleForm->isSubmitted() && $newArticleForm->isValid()) {

            $article->setUserAdmin($admin);


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
            "access" => $access,
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
    public function editArticle(Article $article, EntityManagerInterface $em, Request $request, SluggerInterface $slugger)
    {

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
