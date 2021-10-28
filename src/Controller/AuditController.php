<?php

namespace App\Controller;

use App\Entity\Audit\PartOne;
use App\Entity\Status;
use App\Form\Audit\IncPartOne\ChildrenType;
use App\Form\Audit\IncPartOne\IntelligenceType;
use App\Form\Audit\IncPartOne\MariedType;
use App\Form\Audit\IncPartOne\ObjectiveType;
use App\Form\Audit\PartOneType;
use App\Entity\Audit\Evolution;
use App\Entity\Audit\FutureIncome;
use App\Entity\Audit\Guarantee;
use App\Entity\Audit\GuaranteeLabel;
use App\Entity\Audit\PartTwo;
use App\Entity\Audit\Salary;
use App\Form\Audit\GuaranteeType;
use App\Form\Audit\IncPartTwo\EvolutionType;
use App\Form\Audit\IncPartTwo\FutureIncomeType;
use App\Form\Audit\IncPartTwo\SalaryType;
use App\Form\Audit\PartTwoType;
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
     * @Route("/audit/page1", name="auditPartOne")
     */
    public function partOne()
    {
        // Nouvelle instance de PartOne
        $auditPartOne = new PartOne();


        //----- Creation des Formulaires
        $objectiveForm = $this->createForm(ObjectiveType::class);
        $intelligenceForm = $this->createForm(IntelligenceType::class);
        $partOneForm = $this->createForm(PartOneType::class);
        $mariedForm = $this->createForm(MariedType::class);


//todo : ramener objectiveForm... dans partOneType
        return $this->render("audit/auditPartOne.html.twig", [
            'objectiveForm' => $objectiveForm->createView(),
            'intelligenceForm' => $intelligenceForm->createView(),
            'partOneForm' => $partOneForm->createView(),
            'mariedForm' => $mariedForm->createView(),
        ]);
    }


    /**
     * @Route("/audit/page2", name="auditPartTwo")
     */
    public function partTwo(Request $request, EntityManagerInterface $em)
    {
        $auditPartTwo = new PartTwo();
        $guarenteeLabelRepo = $this->getDoctrine()->getRepository(GuaranteeLabel::class);
        $guarenteeLabels = $guarenteeLabelRepo->findAll();


        // Création du formulaire général
        $newAuditPartTwo = $this->createForm(PartTwoType::class, $auditPartTwo);
        $newAuditPartTwo->handleRequest($request);

        if( $newAuditPartTwo->isSubmitted() && $newAuditPartTwo->isValid() ){

            $futureIncome[] = $auditPartTwo->getFutureIncome();

            if($newAuditPartTwo->get('enregistrer')->isClicked()){

                $auditPartTwo->addFutureIncome($futureIncome[]);


                $em->persist($auditPartTwo);
                $em->flush();
            }
        }




        return $this->render("audit/part_two.html.twig", [

            "newAuditPartTwo" => $newAuditPartTwo->createView(),
            "auditPartTwo" => $auditPartTwo,
            "guaranteeLabels" => $guarenteeLabels


        ]);
    }

}
