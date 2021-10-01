<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @Route("/profile/{id}", name="app_profile", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function detailProfile($id)
    {
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $user= $userRepo->find($id);


        return $this->render('user/profile.html.twig', [
            'user' => $user,
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
