<?php

namespace App\Controller;

use App\Entity\Audit\Children;
use App\Entity\Audit\FutureIncome;
use App\Entity\Audit\Guarantee;
use App\Entity\Audit\GuaranteeLabel;
use App\Entity\Audit\PartOne;

use App\Entity\Audit\PartTwo;
use App\Entity\Audit\ProStatus;
use App\Entity\Audit\ShareInCompagny;
use App\Entity\Audit\TotalAnnualIncome;
use App\Entity\Status;
use App\Form\Audit\IncPartOne\ChildrenType;
use App\Form\Audit\IncPartOne\IntelligenceType;
use App\Form\Audit\IncPartOne\MariedType;
use App\Form\Audit\IncPartOne\ObjectiveType;

use App\Form\Audit\PartOneType;
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
            $em->persist($auditPartOne);
            $em-> flush();


            $this->addFlash('success', "Etape 1 enregistrée");
            return $this->redirectToRoute('general');
        }

        return $this->render("audit/auditPartOne.html.twig", [
            'partOneForm' => $partOneForm->createView(),
        ]);
    }

    /**
     * @Route("/audit/page2", name="auditPartTwo", methods={"GET","POST"})
     */
    public function partTwo (Request $request, EntityManagerInterface $em)
    {

        $newAuditPartTwo = new PartTwo ;

        $guaranteeLabelRepo = $this->getDoctrine()->getRepository(GuaranteeLabel::class);
        $guaranteeLabels = $guaranteeLabelRepo->findAll();

        //FI = FutureIncome // Instanciation des 3 futureIncome (question 7 )
        $fiTen = new FutureIncome();
        $fiTen->setYearLabel('Dans 10ans');
        $fiTwenty = new FutureIncome();
        $fiTwenty->setYearLabel('Dans 20ans');
        $fitThirty = new FutureIncome();
        $fitThirty->setYearLabel('Dans 30ans');


        // Ajout des futureIncome à la collection futureIncome
        $newAuditPartTwo->getFutureIncome()->add($fiTen);
        $newAuditPartTwo->getFutureIncome()->add($fiTwenty);
        $newAuditPartTwo->getFutureIncome()->add($fitThirty);


        //Instanciation des guaranties ( question 9 )
        $death = new Guarantee();
        $deathLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Décès"]);
        $death->setGuaranteeLabel($deathLabel);

        $stopWorking = new Guarantee();
        $stopWorkingLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Arrêt de travail"]);
        $stopWorking->setGuaranteeLabel($stopWorkingLabel);

        $invalidity = new Guarantee();
        $invalidityLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Invalidité"]);
        $invalidity->setGuaranteeLabel($invalidityLabel);

        $complementaryHealth = new Guarantee();
        $complementaryHealthLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Complémentaire santé"]);
        $complementaryHealth->setGuaranteeLabel($complementaryHealthLabel);

        $dependency = new Guarantee();
        $dependencyLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Dépendances"]);
        $dependency->setGuaranteeLabel($dependencyLabel);

        $retirement = new Guarantee();
        $retirementLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Retraite ( PERP, Medelin, PERCO...)"]);
        $retirement->setGuaranteeLabel($retirementLabel);

        $childrenStudies = new Guarantee();
        $childrenStudiesLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Etudes et installation des enfants"]);
        $childrenStudies->setGuaranteeLabel($childrenStudiesLabel);

        $lifeAccidentGuarantee = new Guarantee();
        $lAGLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Garanties accidents de la vie"]);
        $lifeAccidentGuarantee->setGuaranteeLabel($lAGLabel);

        $juridicProtection = new Guarantee();
        $juridicProtectionLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Protection Juridique"]);
        $juridicProtection->setGuaranteeLabel($juridicProtectionLabel);

        $internetProtection = new Guarantee();
        $internetProtectionLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel"=> "Protection internet/eCommerce"]);
        $internetProtection->setGuaranteeLabel($internetProtectionLabel);

        //Ajout des guaranties à la collection
        $newAuditPartTwo->getGuarantee()->add($death);
        $newAuditPartTwo->getGuarantee()->add($stopWorking);
        $newAuditPartTwo->getGuarantee()->add($invalidity);
        $newAuditPartTwo->getGuarantee()->add($complementaryHealth);
        $newAuditPartTwo->getGuarantee()->add($dependency);
        $newAuditPartTwo->getGuarantee()->add($retirement);
        $newAuditPartTwo->getGuarantee()->add($childrenStudies);
        $newAuditPartTwo->getGuarantee()->add($lifeAccidentGuarantee);
        $newAuditPartTwo->getGuarantee()->add($juridicProtection);
        $newAuditPartTwo->getGuarantee()->add($internetProtection);

        // Création des instances pour totalAnuualIncome ( question 10)
        $divend = new TotalAnnualIncome();
        $divend->setIncomeLabel("Traitements, salaire, et dividens");
        $nonCommercial = new TotalAnnualIncome();
        $nonCommercial-> setIncomeLabel("Bénéfices non commerciaux");
        $industrial = new TotalAnnualIncome();
        $industrial-> setIncomeLabel("Bénéfices industriels et commerciaux");
        $agricultural = new TotalAnnualIncome();
        $agricultural-> setIncomeLabel("Bénéfices agricoles");
        $pension = new TotalAnnualIncome();
        $pension-> setIncomeLabel("Pensions, retraites et rentres");
        $realEstate = new TotalAnnualIncome();
        $realEstate-> setIncomeLabel("Revenus immobiliers");
        $movable = new TotalAnnualIncome();
        $movable-> setIncomeLabel("Revenus mobiliers");
        $various = new TotalAnnualIncome();
        $various-> setIncomeLabel("Revenus divers");

        $newAuditPartTwo->getTotalAnnualIncome()->add($divend);
        $newAuditPartTwo->getTotalAnnualIncome()->add($nonCommercial);
        $newAuditPartTwo->getTotalAnnualIncome()->add($industrial);
        $newAuditPartTwo->getTotalAnnualIncome()->add($agricultural);
        $newAuditPartTwo->getTotalAnnualIncome()->add($pension);
        $newAuditPartTwo->getTotalAnnualIncome()->add($realEstate);
        $newAuditPartTwo->getTotalAnnualIncome()->add($movable);
        $newAuditPartTwo->getTotalAnnualIncome()->add($various);

        // Création du formulaire partie 2
        $partTwoForm = $this->createForm(PartTwoType::class, $newAuditPartTwo);
        $partTwoForm->handleRequest($request);

        if($partTwoForm->isSubmitted() && $partTwoForm->isValid()){
            $em->persist($newAuditPartTwo);
            $em-> flush();


            $this->addFlash('success', "Etape 2 enregistrée");
            return $this->redirectToRoute('general');
        }

        return $this->render("audit/part_two.html.twig", [
            'partTwoForm' => $partTwoForm->createView(),
           'guaranteeLabels'=> $guaranteeLabels,
           "newAuditPartTwo"=> $newAuditPartTwo,
            "death"=>$death

        ]);
    }
}
