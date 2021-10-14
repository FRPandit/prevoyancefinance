<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\CommentaryType;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Curl\User;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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



        // GESTION DU BLOC ACTUALITES
        $lastActus = $paginator->paginate(
            $articleRepo->lastActu(),
            $request->query->getInt('page',1),
            3
        );


        // GESTION DU BLOC OFFRE DU MOMENT
        $lastOffers = $this->currentOffers();


        // GESTION DU BLOC LES PLUS LUS
        $mostReads = $articleRepo->mostRead();


        return $this->render("layout.html.twig", [
            'controller_name' => 'GeneralController',
            "lastOffers"=>$lastOffers,
            "lastActus" => $lastActus,
            "mostReads" => $mostReads,

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
        $article= $articleRepo->find($id);

        //NB de vues pour le tri dans le carrousel incrémenté de 1
        $nbOfView=$article->getNbOfView();
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
        if($newCommentForm->isSubmitted() && $newCommentForm->isValid())
        {
            // Commentaire stocké dans un tableau avec les autres informations
            //concernant le commentaire
            //Récupération de ce tableau
          $commentRequest = (object) $request->get("commentary");
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



        return $this->render("general/actuality.html.twig",[
            "article"=>$article,
            "commentaries"=>$commentaries,
            "newCommentForm"=>$newCommentForm->createView(),
            "lastOffers" => $lastOffers
        ]);

    }

    /**
     * @Route("/mutuelle" , name="mutual_info", methods={"GET","POST"})
     */
    public function mutualInfo(){

        // BLOC offre du moment
        $lastOffers = $this->currentOffers();

        $currentOffer = $this->getDoctrine()->getRepository(Article::class)->lastOfferMutual();



        return $this->render("general/layout_info_thematic.html.twig",[
            "lastOffers"=>$lastOffers,
            "currentOffer"=>$currentOffer
        ]);

    }



    private function currentOffers(){
        $actuallyDate = new \DateTime();
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $currentOffers = $articleRepo->lastFiveOffers($actuallyDate);

        return $currentOffers;
    }


}
