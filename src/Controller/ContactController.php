<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;

class ContactController extends AbstractController
{
    /**
    * @Route("/contact", name="contact")
    */
    public function index(): Response
    {
        $PriseDeContact = $this->createForm(ContactType::class);
        return $this->render('contact/index.html.twig', [
            'Titre' => 'Contact',
            'PriseDeContact' => $PriseDeContact->createView(),
        ]);
    }
}
