<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Thematic;
use App\Entity\User;
use App\Form\CommentaryType;
use App\Repository\ArticleRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

// Controller général de la partie blog, actus, offres du moment, contact, mentions légales, CGU, Politique de
// confidentialité, Politique de cookies, newsletter
class GeneralController extends AbstractController
{


    /**
     * @Route("/", name="general")
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {

        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $categoryRepo = $this->getDoctrine()->getRepository(Category::class);
        $categories = $categoryRepo->findAll();
        $thematicRepo = $this->getDoctrine()->getRepository(Thematic::class);
        $thematiques = $thematicRepo->findAll();

        //Recherche d'article sur le filtre
        //Récupération de la recherche utilisateur
        $nameArticle = $request->get("search_by_name");
        $nameCategory = $request->get("search_by_category");
        $nameThematic = $request->get("search_by_thematic");




        // GESTION DU BLOC ACTUALITES
        $lastActus = $paginator->paginate(
            $articleRepo->lastActu(),
            $request->query->getInt('page', 1),
            3
        );


        // GESTION DU BLOC OFFRE DU MOMENT
        $lastOffers = $this->currentOffers();


        // GESTION DU BLOC LES PLUS LUS
        $mostReads = $articleRepo->mostRead();

        // Passage des valeurs de la recherche à la requête, récupération des résultats et affichage
        //avec pagination.
        if($nameArticle != null || $nameCategory != null || $nameThematic != null) {
            $resultSearch = $paginator->paginate(
                $articleRepo->userSearch($nameArticle, $nameCategory, $nameThematic),
                $request->query->getInt('page', "1"),
                5);

            return $this->render("general/search_user.html.twig",['resultSearch'=>$resultSearch]
            );
        }


        return $this->render("layout.html.twig", [
            'controller_name' => 'GeneralController',
            "lastOffers" => $lastOffers,
            "lastActus" => $lastActus,
            "mostReads" => $mostReads,
            "thematiques" => $thematiques,
            "categories" => $categories,
            "nameArticle"=>$nameArticle,
            "nameCategory"=>$nameCategory,
            "nameThematic"=>$nameThematic,



        ]);
    }

    /**
     * @Route("/actualité/{id}" , name="view_article", requirements={"id":"\d+"}, methods={"GET","POST"})
     */
    public function viewArticle($id, EntityManagerInterface $em, Request $request)
    {


        //Récupération utilisateur en cours

        $user = $this->getUser();

        // AFFICHAGE DE L'ARTICLE
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $article = $articleRepo->find($id);

        //NB de vues pour le tri dans le carrousel incrémenté de 1
        $nbOfView = $article->getNbOfView();
        $nbOfView++;
        $article->setNbOfView($nbOfView);
        $em->persist($article);
        $em->flush();


        //COMMENTAIRES
        //Création du formulaire
        $commentary = new Comment();
        $newCommentForm = $this->createForm(CommentaryType::class);
        $newCommentForm->handleRequest($request);


        //Envoi du commentaire en BDD
        if ($newCommentForm->isSubmitted() && $newCommentForm->isValid()) {
            // Commentaire stocké dans un tableau avec les autres informations
            //concernant le commentaire
            //Récupération de ce tableau
            $commentRequest = (object)$request->get("commentary");
            // Récupération du commentaire en lui même
            $comment = $commentRequest->comment;

            // set de l'id article concerné par le commentaire
            $commentary->setArticle($article);
            // set de l'utilisateur postant de le commentaire
            //soit l'utilisateur en session
            $commentary->setUser($user);
            //set du commentaire
            $commentary->setComment($comment);

            $em->persist($commentary);
            $em->flush();

        }


        //Affichage des commentaires
        //Récupération des commentaires de l'article
        $commentaries = $article->getComment();

        //BLOC OFFRE DU MOMENT
        $lastOffers = $this->currentOffers();


        return $this->render("general/actuality.html.twig", [
            "article" => $article,
            "commentaries" => $commentaries,
            "newCommentForm" => $newCommentForm->createView(),
            "lastOffers" => $lastOffers
        ]);

    }

    /**
     * @Route("/liste-des-offres", name="list_of_offers", methods={"GET","POST"})
     */
    public function list_of_offers(Request $request,PaginatorInterface $paginator, ArticleRepository $articleRepository){

        $actuallyDate = new \DateTime('now');

        $offers_list = $paginator->paginate($articleRepository->allOffers($actuallyDate),
        $request->query->getInt('page', "1"), 20);

       return $this->render("/general/list_of_offers.html.twig",[
          "offers_list"=> $offers_list,
       ]);
    }

    /**
     * @Route("/mutuelle" , name="mutual_info", methods={"GET","POST"})
     */
    public function mutualInfo()
    {

        // BLOC offres du moment
        $lastOffers = $this->currentOffers();

        // Offre en cours
        $idthematic = "1";
        $mutualCurrentOffers = $this->currentOfferByThematic($idthematic);


        return $this->render("general/thematic_info/mutual_info.html.twig", [
            "lastOffers" => $lastOffers,

            "mutualCurrentOffers" => $mutualCurrentOffers
        ]);

    }

    /**
     * @Route("/prevoyance" , name="foresight_info", methods={"GET","POST"})
     */
    public function foresightInfo()
    {

        // BLOC offres du moment
        $lastOffers = $this->currentOffers();

        // Offre en cours
        $idthematic = "2";
        $foresightCurrentOffers = $this->currentOfferByThematic($idthematic);


        return $this->render("general/thematic_info/foresight_info.html.twig", [
            "lastOffers" => $lastOffers,

            "foresightCurrentOffers" => $foresightCurrentOffers
        ]);

    }

    /**
     * @Route("/epargne" , name="saving_info", methods={"GET","POST"})
     */
    public function savingInfo()
    {

        // BLOC offres du moment
        $lastOffers = $this->currentOffers();

        // Offre en cours
        $idthematic = "3";
        $savingCurrentOffers = $this->currentOfferByThematic($idthematic);


        return $this->render("general/thematic_info/saving_info.html.twig", [
            "lastOffers" => $lastOffers,

            "savingCurrentOffers" => $savingCurrentOffers
        ]);

    }

    /**
     * @Route("/retraite" , name="retirement_info", methods={"GET","POST"})
     */
    public function retirementInfo()
    {

        // BLOC offres du moment
        $lastOffers = $this->currentOffers();

        // Offre en cours
        $idthematic = "4";
        $retirementCurrentOffers = $this->currentOfferByThematic($idthematic);


        return $this->render("general/thematic_info/retirement_info.html.twig", [
            "lastOffers" => $lastOffers,

            "retirementCurrentOffers" => $retirementCurrentOffers
        ]);

    }

    /**
     * @Route("/impots" , name="tax_info", methods={"GET","POST"})
     */
    public function taxeInfo()
    {

        // BLOC offres du moment
        $lastOffers = $this->currentOffers();

        // Offre en cours
        $idthematic = "5";
        $taxCurrentOffers = $this->currentOfferByThematic($idthematic);


        return $this->render("general/thematic_info/tax_info.html.twig", [
            "lastOffers" => $lastOffers,

            "taxCurrentOffers" => $taxCurrentOffers
        ]);

    }

    /**
     * @Route("/succession" , name="succession_info", methods={"GET","POST"})
     */
    public function successionInfo()
    {

        // BLOC offres du moment
        $lastOffers = $this->currentOffers();

        // Offre en cours
        $idthematic = "6";
        $successionCurrentOffers = $this->currentOfferByThematic($idthematic);


        return $this->render("general/thematic_info/succession_info.html.twig", [
            "lastOffers" => $lastOffers,

            "successionCurrentOffers" => $successionCurrentOffers
        ]);

    }

    /**
     * @Route("/qui-sommes-nous", name="company_info" )
     */
    public function companyInfo()
    {
        $lastOffers = $this->currentOffers();

        return $this->render("general/thematic_info/company_info.html.twig", [
            "lastOffers" => $lastOffers
        ]);
    }


    /////// FONCTION UTILISABLE DANS CHAQUE FONCTION DE ROUTE

    // fonction qui sert à appellé les 5 dernières offres en cours
    private function currentOffers()
    {
        $actuallyDate = new DateTime();
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $currentOffers = $articleRepo->lastFiveOffers($actuallyDate);

        return $currentOffers;
    }

    //fonction qui sert à appeler la dernière offre en cours par thématique
    private function currentOfferByThematic($idthematic)
    {
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $currentOffers = $articleRepo->lastOfferMutual($idthematic);

        return $currentOffers;
    }
}
