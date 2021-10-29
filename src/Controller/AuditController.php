<?php

namespace App\Controller;

use App\Entity\Audit\Children;
use App\Entity\Audit\PartOne;
use App\Form\Audit\PartOneType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Controller pour toute la partie audit
class AuditController extends AbstractController
{
    /**
     * @Route("/audit", name="audit")
     */
    public function index(): Response
    {
        return $this->render('audit/index.html.twig', [
            'controller_name' => 'AuditController',
        ]);
    }



    /**
     * @Route("/audit/page1", name="auditPartOne", methods={"GET","POST"})
     */
    public function partOne(Request $request, EntityManagerInterface $em)
    {
        // Nouvelle instance de PartOne
        $auditPartOne = new PartOne();

        // 4 instance de Children pour la collection
        $ch1 = new Children();
        $ch2 = new Children();
        $ch3 = new Children();
        $ch4 = new Children();

        // ajout des 4 children à la collection
        $auditPartOne -> getChildren()->add($ch1);
        $auditPartOne -> getChildren()->add($ch2);
        $auditPartOne -> getChildren()->add($ch3);
        $auditPartOne -> getChildren()->add($ch4);



        //----- Creation du Formulaire qui englobe toute la partie 1
        $partOneForm = $this->createForm(PartOneType::class, $auditPartOne);
        $partOneForm->handleRequest($request);

        //Vérification de la soumission et de la validité du formulaire
        if($partOneForm->isSubmitted() && $partOneForm->isValid()){
            $em->persist($auditPartOne);
            $em-> flush();


            $this->addFlash('success', "Etape 1 enregistrée");
            return $this->redirectToRoute('general');
        }

        return $this->render("audit/auditPartOne.html.twig", [
            'partOneForm' => $partOneForm->createView(),
        ]);
    }

}
