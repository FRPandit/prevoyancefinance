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

        // Permet d'avoir la date du jour.
        $actuallyDate = new \DateTime();


        // GESTION DU BLOC ACTUALITES
        $lastActus = $paginator->paginate(
            $articleRepo->lastActu(),
            $request->query->getInt('page',1),
            3
        );


        // GESTION DU BLOC OFFRE DU MOMENT
        $lastOffers = $articleRepo->lastFiveOffers($actuallyDate);



        return $this->render("layout.html.twig", [
            'controller_name' => 'GeneralController',
            "lastOffers"=>$lastOffers,
            "lastActus" => $lastActus
        ]);
    }


    /**
     * @Route("/actualité/{id}" , name="view_article", requirements={"id":"\d+"}, methods={"GET","POST"})
     */
    public function viewArticle($id, EntityManagerInterface $em, Request $request)
    {
        // Permet d'avoir la date du jour.
        $actuallyDate = new \DateTime();

        //Récupération utilisateur en cours

        $user = $this->getUser();

        // AFFICHAGE DE L'ARTICLE
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $article= $articleRepo->find($id);


        //SHARING




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
        $lastOffers = $articleRepo->lastFiveOffers($actuallyDate);

        return $this->render("general/actuality.html.twig",[
            "article"=>$article,
            "commentaries"=>$commentaries,
            "newCommentForm"=>$newCommentForm->createView(),
            "lastOffers" => $lastOffers
        ]);

    }

}
