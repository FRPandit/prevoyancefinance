<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Controller général de la partie blog, actus, offres du moment, contact, mentions légales, CGU, Politique de
// confidentialité, Politique de cookies, newsletter
class GeneralController extends AbstractController
{
    /**
     * @Route("/", name="general")
     */
    public function index(): Response
    {
        return $this->render("layout.html.twig", [
            'controller_name' => 'GeneralController',
        ]);
    }
}
