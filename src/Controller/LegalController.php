<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Controller pour les conditions générales
class LegalController extends AbstractController
{
    /**
     * @Route("/legal/conditions-generales", name="conditions-generales")
     */
    public function index(): Response
    {
        return $this->render('legal/index.html.twig', [
            'Titre' => "Conditions Générales d'Utilisation",
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus venenatis scelerisque. Duis leo neque, auctor vitae ultricies non, sagittis interdum ante. Nulla facilisi. Nullam imperdiet elit quis nisi hendrerit dapibus. Aliquam in quam tempus, efficitur turpis eget, lobortis eros. In ut massa ut mi cursus dapibus efficitur vitae arcu. Phasellus convallis nulla non viverra volutpat. Curabitur quam nulla, rutrum in placerat nec, condimentum id lorem.',
            'CollectionTexts' => ["A", "B", "C"]
        ]);
    }

    /**
     * @Route("/legal/mentions-legales", name="mentions-legales")
     */
    public function MentionsLegales(): Response
    {
        return $this->render('legal/index.html.twig', [
            'Titre' => "Mentions Légales",
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus venenatis scelerisque. Duis leo neque, auctor vitae ultricies non, sagittis interdum ante. Nulla facilisi. Nullam imperdiet elit quis nisi hendrerit dapibus. Aliquam in quam tempus, efficitur turpis eget, lobortis eros. In ut massa ut mi cursus dapibus efficitur vitae arcu. Phasellus convallis nulla non viverra volutpat. Curabitur quam nulla, rutrum in placerat nec, condimentum id lorem.',
            'CollectionTexts' => [
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus venenatis scelerisque. Duis leo neque, auctor vitae ultricies non, sagittis interdum ante. Nulla facilisi. Nullam imperdiet elit quis nisi hendrerit dapibus. Aliquam in quam tempus, efficitur turpis eget, lobortis eros. In ut massa ut mi cursus dapibus efficitur vitae arcu. Phasellus convallis nulla non viverra volutpat. Curabitur quam nulla, rutrum in placerat nec, condimentum id lorem."
            ]
        ]);
    }

    /**
     * @Route("/legal/politique-de-confidentialites", name="politique-de-confidentialites")
     */
    public function PolitiqueDeConfidentialites(): Response
    {
        return $this->render('legal/index.html.twig', [
            'Titre' => "politique de confidentialites",
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus venenatis scelerisque. Duis leo neque, auctor vitae ultricies non, sagittis interdum ante. Nulla facilisi. Nullam imperdiet elit quis nisi hendrerit dapibus. Aliquam in quam tempus, efficitur turpis eget, lobortis eros. In ut massa ut mi cursus dapibus efficitur vitae arcu. Phasellus convallis nulla non viverra volutpat. Curabitur quam nulla, rutrum in placerat nec, condimentum id lorem.',
        ]);
    }  
    
    /**
     * @Route("/legal/politique-de-cookies", name="politique-de-cookies")
     */
    public function PolitiqueDeCookies(): Response
    {
        return $this->render('legal/index.html.twig', [
            'Titre' => "politique de cookies",
            'Description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed cursus venenatis scelerisque. Duis leo neque, auctor vitae ultricies non, sagittis interdum ante. Nulla facilisi. Nullam imperdiet elit quis nisi hendrerit dapibus. Aliquam in quam tempus, efficitur turpis eget, lobortis eros. In ut massa ut mi cursus dapibus efficitur vitae arcu. Phasellus convallis nulla non viverra volutpat. Curabitur quam nulla, rutrum in placerat nec, condimentum id lorem.',
        ]);
    }      
}
