<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Controller qui servira pour l'administration du site (articles, partenaires...)
class AdminController extends AbstractController
{
    /**
     * @Route("/admin/tableau_de_bord", name="homeback")
     */
    public function index(Request $request)
    {

        // Récupération des articles
        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articleRepo->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'homeback',
            "articles"=>$articles
        ]);
    }

    /**
     * @Route("/admin/list_article", name="listArticle")
     */
    public function listArticle(Request $request){

        $articleRepo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $articleRepo->findAll();

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

        $articles = $articleRepo->findByFilter();

        return $this->render('admin/listArticle.html.twig', [
            'controller_name' => 'homeback',
            "articles"=>$articles
        ]);

    }
}
