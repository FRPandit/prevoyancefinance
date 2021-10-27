<?php

namespace App\Controller;

use App\Entity\Audit\Children;
use App\Entity\Audit\Intelligence;
use App\Entity\Audit\Maried;
use App\Entity\Audit\Objective;
use App\Entity\Audit\PartOne;
use App\Entity\Audit\ProStatus;
use App\Entity\Audit\ShareInCompagny;
use App\Entity\Status;
use App\Form\Audit\IncPartOne\ChildrenType;
use App\Form\Audit\IncPartOne\IntelligenceType;
use App\Form\Audit\IncPartOne\MariedType;
use App\Form\Audit\IncPartOne\ObjectiveType;
use App\Form\Audit\PartOneType;
use App\Entity\Audit\Evolution;
use App\Entity\Audit\FutureIncome;
use App\Entity\Audit\PartTwo;
use App\Entity\Audit\Salary;
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
//dd($auditPartOne);
            $em->persist($auditPartOne);
            $em-> flush();

            $this->addFlash('success', "Etape 1 enregistrée");
            return $this->redirectToRoute('general');
        }



        return $this->render("audit/auditPartOne.html.twig", [
            'partOneForm' => $partOneForm->createView(),
        ]);
    }

//
//    /**
//     * @Route("/audit/page2", name="auditPartTwo")
//     */
//    public function partTwo(Request $request, EntityManagerInterface $em)
//    {
//
//        $auditPartTwo = new PartTwo();
//        $salary = new Salary();
//
//        $evolution = new Evolution();
//        $futureSalary = new Salary();
//
//        $futureIncomeTen = new FutureIncome();
//        $futureIncomeTwenty = new FutureIncome();
//        $futureIncomeThirty = new FutureIncome();
//        $futureSalaryTen = new Salary();
//        $futureSalaryTwenty = new Salary();
//        $futureSalaryThirty = new Salary();
//
//
//        // Création du formulaire général
//        $newAuditPartTwo = $this->createForm(PartTwoType::class, $auditPartTwo);
//        $newAuditPartTwo->handleRequest($request);
//
//        //Création formulaire niveau actuel de rémunération (question 5 )
//        $newActualSalary = $this->createForm(SalaryType::class, $salary);
//        $newActualSalary->handleRequest($request);
//
//        //Création formulaire nouveau poste/ augmentation ( question 6)
//        $newEvolution = $this->createForm(EvolutionType::class, $evolution);
//        $newEvolution->handleRequest($request);
//        $newFutureSalary = $this->createForm(SalaryType::class, $futureSalary);
//        $newFutureSalary->handleRequest($request);
//
//        //Création formulaire futurs revenus (question 7 )
//        // dans 10ans :
//        $newFutureIncomeTen = $this->createForm(FutureIncomeType::class, $futureIncomeTen);
//        $newFutureIncomeTen->handleRequest($request);
//        $newFutureSalaryTen = $this->createForm(SalaryType::class, $futureSalaryTen);
//        $newFutureSalaryTen->handleRequest($request);
//        // Dans 20ans :
//        $newFutureIncomeTwenty = $this->createForm(FutureIncomeType::class, $futureIncomeTwenty);
//        $newFutureIncomeTwenty->handleRequest($request);
//        $newFutureSalaryTwenty = $this->createForm(SalaryType::class, $futureSalaryTwenty);
//        $newFutureSalaryTwenty->handleRequest($request);
//        //Dans 30 ans :
//        $newFutureIncomeThirty = $this->createForm(FutureIncomeType::class, $futureIncomeThirty);
//        $newFutureIncomeThirty->handleRequest($request);
//        $newFutureSalaryThirty = $this->createForm(SalaryType::class, $futureSalaryThirty);
//        $newFutureSalaryThirty->handleRequest($request);
//
//
//        return $this->render("audit/part_two.html.twig", [
//            "newAuditPartTwo" => $newAuditPartTwo->createView(),
//            "auditPartTwo" => $auditPartTwo,
//            "newActualSalary" => $newActualSalary->createView(),
//            "salary" => $salary,
//            "newEvolution" => $newEvolution->createView(),
//            "evolution" => $evolution,
//            "newFutureSalary" => $newFutureSalary->createView(),
//            "futureSalary" => $futureSalary,
//            "newFutureIncomeTen" => $newFutureIncomeTen->createView(),
//            "futureIncomeTen"=>$futureIncomeTen,
//            "newFutureSalaryTen"=>$newFutureSalaryTen->createView(),
//            "futureSalaryTen"=>$futureSalaryTen,
//            "newFutureIncomeTwenty" => $newFutureIncomeTwenty->createView(),
//            "futureIncomeTwenty"=>$futureIncomeTwenty,
//            "newFutureSalaryTwenty"=>$newFutureSalaryTwenty->createView(),
//            "futureSalaryTwenty"=>$futureSalaryTwenty,
//            "newFutureIncomeThirty" => $newFutureIncomeThirty->createView(),
//            "futureIncomeThirty"=>$futureIncomeThirty,
//            "newFutureSalaryThirty"=>$newFutureSalaryThirty->createView(),
//            "futureSalaryThirty"=>$futureSalaryThirty,
//
//
//        ]);
//    }

}
