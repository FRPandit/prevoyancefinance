<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//Controller pour profil utilisateur

/**
 * Class UserController
 * @package App\Controller
 * @Route("/user")
 */
class UserController extends AbstractController
{

    /**
     * @Route("/edit-profile/{id}", name="app_profile", requirements={"id": "\d+"}, methods={"GET", "POST"})
     */
    public function editProfile($id,EntityManagerInterface $em, Request $request)
    {
        //Recuperation de l'instance de repository
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $user= $userRepo->find($id);

        //----- creation du Formulaire
        //on crée une instance de la classe Form à partir de la classe User avec les données de $user
        $editProfileForm = $this->createForm(EditProfileType::class, $user);

        //----- gérer le traitement de la saisie du formulaire.
        // Lorsque l’utilisateur valide la saisie du formulaire, une requête HTTP avec la commande POST
        // est transmise avec la même url que celle qui à provoqué l’affichage du formulaire.
        // Le contenu de la requête est traitée et les données affectées aux propriétés de l’instance
        // qui a été donnée en paramètre de l’instruction précédente (ici $user).
        $editProfileForm->handleRequest($request);

        //----- Verification soumission et validité du formulaire
        if ($editProfileForm->isSubmitted()&& $editProfileForm->isValid())
        {
            $em->persist($user);
            $em->flush();

            //Ajout du message flash
            $this->addFlash('success', 'Profil enregistré!');

            return $this->redirectToRoute('general');

        }


        //redirection vers la vue "profile"
        return $this->render('user/profile.html.twig', [
            'user' => $user,
            'editProfileForm' => $editProfileForm ->createView(),
        ]);
    }

    /**
     * @Route("/", name="user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
