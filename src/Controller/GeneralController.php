<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
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



}
