<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Gender;
use App\Entity\User;
use App\Form\AddressType;
use App\Form\ConnectionType;
use App\Form\EditProfileType;
use App\Form\RegistrationFormType;
use App\Form\UpdatePwdType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
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
    public function editProfile(User $user,EntityManagerInterface $em, Request $request, SluggerInterface $slugger, UserPasswordEncoderInterface $passwordEncoder)
    {
//--------------- Profil
//        //----- Recuperation de l'instance de repository -> pas besoin vu qu'on passe User $user en paramètre
//        $userRepo = $this->getDoctrine()->getRepository(User::class);
//        $user= $userRepo->find($id);

        // Récupération de l'address_id
        $address_id = $user->getAddress();

        //----- Creation du Formulaire
        //on crée une instance de la classe Form à partir de la classe User avec les données de $user
        $editProfileForm = $this->createForm(EditProfileType::class, $user);

        //deuxième formulaire
        $addressForm= $this->createForm(AddressType::class, $address_id);


        //----- gérer le traitement de la saisie du formulaire.
        // Lorsque l’utilisateur valide la saisie du formulaire, une requête HTTP avec la commande POST
        // est transmise avec la même url que celle qui à provoqué l’affichage du formulaire.
        // Le contenu de la requête est traitée et les données affectées aux propriétés de l’instance
        // qui a été donnée en paramètre de l’instruction précédente (ici $user).
        $editProfileForm->handleRequest($request);
        $addressForm->handleRequest($request);

        //----- Verification soumission et de la validité (champs requis complétés) du formulaire Profil
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

//--------------- Mot de Passe

        //----- Creation du Formulaire
        $updatePwdForm= $this->createForm(UpdatePwdType::class, $user);
        $updatePwdForm->handleRequest($request);



        //----- Verification soumission et de la validité (champs requis complétés) du formulaire Mot de passe
        if ($updatePwdForm->isSubmitted() && $updatePwdForm->isValid()) {

//           public function change_user_password(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
            $updatepwd = (object) $request->get('update_pwd');
            $old_password = $updatepwd->old_password;

            $new_pwd = $updatepwd->plainPassword["first"];
            $new_pwd_confirm = $updatepwd->plainPassword["second"];

            $user = $this->getUser(); // Null
            dd($user); // CRASH
            $checkPass = $passwordEncoder->isPasswordValid($user, $old_password);
            dd($checkPass);
            if($checkPass === true) {

                $user->setPwd(
                    $passwordEncoder->encodePassword(
                        $user,
                        $updatePwdForm->get('plainPassword')->getData()
                    )
                );


                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                // do anything else you need here, like send an email
                return $this->redirectToRoute('general');

            } else {
                return null;
            }
//          }


        }

//***********************************************************************
        //redirection vers la vue "profile"
        return $this->render('user/profile.html.twig', [
            'user' => $user,
            'address' => $address_id,
            'editProfileForm' => $editProfileForm ->createView(),
            'updatePwdForm'=> $updatePwdForm->createView(),
            'addressform' => $addressForm ->createView(),
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
