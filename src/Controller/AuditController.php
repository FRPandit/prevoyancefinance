<?php

namespace App\Controller;

use App\Entity\Audit\Children;
use App\Entity\Audit\FutureIncome;
use App\Entity\Audit\Guarantee;
use App\Entity\Audit\GuaranteeLabel;
use App\Entity\Audit\PartOne;

use App\Entity\Audit\PartThree\CreditLeasing;
use App\Entity\Audit\PartThree\PartThree;
use App\Entity\Audit\PartThree\Patrimony;
use App\Entity\Audit\PartThree\PatrimonyLabel;
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
use App\Form\Audit\PartThreeType;
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


    /**
     * @Route("/audit/page3", name="auditPartThree", methods={"GET","POST"})
     */
    public function partThree (Request $request, EntityManagerInterface $em)
    {
        $auditPartThree = new PartThree();

        $patrimonyLabelRepo = $this->getDoctrine()->getRepository(PatrimonyLabel::class);

        //récupération des labels pour les lister dans l'affichage
        $patrimonyLabels= $patrimonyLabelRepo->findAll();



    // ----- Instanciation des "patrimoines"

        //"Résidence principale"
        $principalResidence =  new Patrimony();
        $principalResidenceLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Résidence principale"]);
        //on set l'instance $principalResidence avec le label "Résidence principale"
        $principalResidence->setPatrimonyLabel($principalResidenceLabel);

        //"Résidence secondaire"
        $secondHome =  new Patrimony();
        $secondHomeLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Résidence secondaire"]);
        $secondHome->setPatrimonyLabel($secondHomeLabel);

        //"Autres Biens"
        $otherGoods =  new Patrimony();
        $otherGoodsLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Autres Biens"]);
        $otherGoods->setPatrimonyLabel($otherGoodsLabel);

        //"Bien Locatif 1"
        $firstRentalProperty =  new Patrimony();
        $firstRentalPropertyLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Bien Locatif 1"]);
        $firstRentalProperty->setPatrimonyLabel($firstRentalPropertyLabel);

        //"Bien Locatif 2"
        $secondRentalProperty =  new Patrimony();
        $secondRentalPropertyLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Bien Locatif 2"]);
        $secondRentalProperty->setPatrimonyLabel($secondRentalPropertyLabel);

        //"Bien Locatif 3"
        $thirdRentalProperty =  new Patrimony();
        $thirdRentalPropertyLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Bien Locatif 3"]);
        $thirdRentalProperty->setPatrimonyLabel($thirdRentalPropertyLabel);

        //"Pats de SCI ou SCPI"
        $sciScpi =  new Patrimony();
        $sciScpiLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Pats de SCI ou SCPI"]);
        $sciScpi->setPatrimonyLabel($sciScpiLabel);

        //"Autres"
        $other =  new Patrimony();
        $otherLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Autres"]);
        $other->setPatrimonyLabel($otherLabel);

        //"Immobilier professionnel"
        $ProfessionalRealEstate =  new Patrimony();
        $ProfessionalRealEstateLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Immobilier professionnel"]);
        $ProfessionalRealEstate->setPatrimonyLabel($ProfessionalRealEstateLabel);

        //"Placement Foncier"
        $landPlacement =  new Patrimony();
        $landPlacementLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Placement Foncier"]);
        $landPlacement->setPatrimonyLabel($landPlacementLabel);

        //"Objets: Meubles et Véhicules"
        $objects =  new Patrimony();
        $objectsLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Objets: Meubles et Véhicules"]);
        $objects->setPatrimonyLabel($objectsLabel);


        $auditPartThree->getPatrimony()->add($principalResidence);
        $auditPartThree->getPatrimony()->add($secondHome);
        $auditPartThree->getPatrimony()->add($otherGoods);
        $auditPartThree->getPatrimony()->add($firstRentalProperty);
        $auditPartThree->getPatrimony()->add($secondRentalProperty);
        $auditPartThree->getPatrimony()->add($thirdRentalProperty);
        $auditPartThree->getPatrimony()->add($sciScpi);
        $auditPartThree->getPatrimony()->add($other);
        $auditPartThree->getPatrimony()->add($ProfessionalRealEstate);
        $auditPartThree->getPatrimony()->add($landPlacement);
        $auditPartThree->getPatrimony()->add($objects);

        // ----- Instanciation des Crédits et Leasing
        $cl1= new CreditLeasing();
        $cl2= new CreditLeasing();
        $cl3= new CreditLeasing();
        $cl4= new CreditLeasing();

        $auditPartThree->getCreditLeasing()->add($cl1);
        $auditPartThree->getCreditLeasing()->add($cl2);
        $auditPartThree->getCreditLeasing()->add($cl3);
        $auditPartThree->getCreditLeasing()->add($cl4);

        //création du formulaire partie 3
        $auditPartThreeForm= $this->createForm(PartThreeType::class, $auditPartThree);
        $auditPartThreeForm->handleRequest($request);

//todo: PB persist
// SQLSTATE[23000]: Integrity constraint violation: 1048 Le champ 'patrimony_label_id' ne peut être vide (null)

//        //Vérification de la soumission et de la validité du formulaire
//        if($auditPartThreeForm->isSubmitted() && $auditPartThreeForm->isValid()){
//            $em->persist($auditPartThree);
//            $em-> flush();
//
//
//            $this->addFlash('success', "Etape 3 enregistrée");
//            return $this->redirectToRoute('general');
//        }

        return $this->render("audit/part_three.html.twig", [
            "auditPartThreeForm" => $auditPartThreeForm->createview(),
            "patrimonyLabels" => $patrimonyLabels,
            "auditPartThree" => $auditPartThree,


        ]);
    }
}
