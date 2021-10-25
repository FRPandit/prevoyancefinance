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
        $salary = new Salary();

        $evolution = new Evolution();
        $futureSalary = new Salary();

        $futureIncomeTen = new FutureIncome();
        $futureIncomeTwenty = new FutureIncome();
        $futureIncomeThirty = new FutureIncome();
        $futureSalaryTen = new Salary();
        $futureSalaryTwenty = new Salary();
        $futureSalaryThirty = new Salary();


        // Création du formulaire général
        $newAuditPartTwo = $this->createForm(PartTwoType::class, $auditPartTwo);
        $newAuditPartTwo->handleRequest($request);

        //Création formulaire niveau actuel de rémunération (question 5 )
        $newActualSalary = $this->createForm(SalaryType::class, $salary);
        $newActualSalary->handleRequest($request);

        //Création formulaire nouveau poste/ augmentation ( question 6)
        $newEvolution = $this->createForm(EvolutionType::class, $evolution);
        $newEvolution->handleRequest($request);
        $newFutureSalary = $this->createForm(SalaryType::class, $futureSalary);
        $newFutureSalary->handleRequest($request);

        //Création formulaire futurs revenus (question 7 )
        // dans 10ans :
        $newFutureIncomeTen = $this->createForm(FutureIncomeType::class, $futureIncomeTen);
        $newFutureIncomeTen->handleRequest($request);
        $newFutureSalaryTen = $this->createForm(SalaryType::class, $futureSalaryTen);
        $newFutureSalaryTen->handleRequest($request);
        // Dans 20ans :
        $newFutureIncomeTwenty = $this->createForm(FutureIncomeType::class, $futureIncomeTwenty);
        $newFutureIncomeTwenty->handleRequest($request);
        $newFutureSalaryTwenty = $this->createForm(SalaryType::class, $futureSalaryTwenty);
        $newFutureSalaryTwenty->handleRequest($request);
        //Dans 30 ans :
        $newFutureIncomeThirty = $this->createForm(FutureIncomeType::class, $futureIncomeThirty);
        $newFutureIncomeThirty->handleRequest($request);
        $newFutureSalaryThirty = $this->createForm(SalaryType::class, $futureSalaryThirty);
        $newFutureSalaryThirty->handleRequest($request);


        return $this->render("audit/part_two.html.twig", [
            "newAuditPartTwo" => $newAuditPartTwo->createView(),
            "auditPartTwo" => $auditPartTwo,
            "newActualSalary" => $newActualSalary->createView(),
            "salary" => $salary,
            "newEvolution" => $newEvolution->createView(),
            "evolution" => $evolution,
            "newFutureSalary" => $newFutureSalary->createView(),
            "futureSalary" => $futureSalary,
            "newFutureIncomeTen" => $newFutureIncomeTen->createView(),
            "futureIncomeTen"=>$futureIncomeTen,
            "newFutureSalaryTen"=>$newFutureSalaryTen->createView(),
            "futureSalaryTen"=>$futureSalaryTen,
            "newFutureIncomeTwenty" => $newFutureIncomeTwenty->createView(),
            "futureIncomeTwenty"=>$futureIncomeTwenty,
            "newFutureSalaryTwenty"=>$newFutureSalaryTwenty->createView(),
            "futureSalaryTwenty"=>$futureSalaryTwenty,
            "newFutureIncomeThirty" => $newFutureIncomeThirty->createView(),
            "futureIncomeThirty"=>$futureIncomeThirty,
            "newFutureSalaryThirty"=>$newFutureSalaryThirty->createView(),
            "futureSalaryThirty"=>$futureSalaryThirty,


        ]);
    }

}
