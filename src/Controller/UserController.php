<?php

namespace App\Controller;

use App\Entity\Gender;
use App\Entity\User;
use App\Form\EditProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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
    public function editProfile($id,EntityManagerInterface $em, Request $request, SluggerInterface $slugger)
    {
        //Recuperation de l'instance de repository
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $user= $userRepo->find($id);

//        $genderRepo = $this->getDoctrine()->getRepository(Gender::class);
//        $gender= $genderRepo->find($id);

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
            $img = $editProfileForm->get('img')->getData();

            // Img n'est pas en required, donc s'effectue seulement si une image est upload
            if ($img) {
                $originalFilename = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
                // Partie nécessaire pour inclure en toute sécurité le nom du fichier dans une partie de l'URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $img->guessExtension();

                //Envoi de l'image dans le bon dossier
                try {
                    $img->move(
                        $this->getParameter('imgUpload'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $e;
                }
                $user->setImg($newFilename);
            }



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
