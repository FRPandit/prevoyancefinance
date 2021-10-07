<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ConnectionType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="app_login", methods={"GET", "POST"})
     *
     */
    public function connection(Request $request, UserPasswordHasherInterface $hasher, AuthenticationUtils $authenticationUtils)
    {

        //Création de l'instance de l'entité participant
        $user = new User();

        //Création de l'instance d'un formulaire
        $userForm = $this->createForm(ConnectionType::class, $user);

        $userForm->handleRequest($request);

        //Tester si le formulaire est bien soumis
        if ($userForm->isSubmitted() && $userForm->isValid())
        {

            //Si le formulaire est bien soumis et valide
            //Hashage du mot de passe
            $hash=$hasher->hashPassword($user,$user->getPassword());
            $user->setPassword($hash);

            //Je récupère les données
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();
            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();

            //Redirection vers une autre page
            return $this->render('general/index.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
        }

        //Passage du formulaire à la vue twig
        return $this->render("security/login.html.twig", [

            "userForm" => $userForm->createView()
        ]);
    }


    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
