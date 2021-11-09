<?php

namespace App\Controller;

use App\Entity\Audit\Children;
use App\Entity\Audit\FutureIncome;
use App\Entity\Audit\Guarantee;
use App\Entity\Audit\GuaranteeLabel;
use App\Entity\Audit\PartFive\DropReaction;
use App\Entity\Audit\PartFive\FinancialInvestment;
use App\Entity\Audit\PartFive\FinancialProducts;
use App\Entity\Audit\PartFive\IndividualForm;
use App\Entity\Audit\PartFive\PartFive;
use App\Entity\Audit\PartFive\Preference;
use App\Entity\Audit\PartFive\PreviousFinancialProducts;
use App\Entity\Audit\PartFive\Risk;
use App\Entity\Audit\PartFive\ShareOfInvestment;
use App\Entity\Audit\PartFive\Unplanned;
use App\Entity\Audit\PartFour\MovableHeritage;
use App\Entity\Audit\PartFour\MovableHeritageLabel;
use App\Entity\Audit\PartFour\PartFour;
use App\Entity\Audit\PartOne;

use App\Entity\Audit\PartSeven\Documents;
use App\Entity\Audit\PartSeven\PartSeven;
use App\Entity\Audit\PartSix\PartSix;
use App\Entity\Audit\PartSix\Recommendation;
use App\Entity\Audit\PartThree\CreditLeasing;
use App\Entity\Audit\PartThree\PartThree;
use App\Entity\Audit\PartThree\Patrimony;
use App\Entity\Audit\PartThree\PatrimonyLabel;
use App\Entity\Audit\PartTwo;
use App\Entity\Audit\TotalAnnualIncome;


use App\Form\Audit\IndividualFormType;
use App\Form\Audit\PartFiveType;
use App\Form\Audit\PartFourType;
use App\Form\Audit\PartOneType;
use App\Form\Audit\PartSevenType;
use App\Form\Audit\PartSixType;
use App\Form\Audit\PartThreeType;
use App\Form\Audit\PartTwoType;
use App\Form\PartSeven2Type;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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
        $auditPartOne->getChildren()->add($ch1);
        $auditPartOne->getChildren()->add($ch2);
        $auditPartOne->getChildren()->add($ch3);
        $auditPartOne->getChildren()->add($ch4);


        //----- Creation du Formulaire qui englobe toute la partie 1
        $partOneForm = $this->createForm(PartOneType::class, $auditPartOne);
        $partOneForm->handleRequest($request);

        //Vérification de la soumission et de la validité du formulaire
        if ($partOneForm->isSubmitted() && $partOneForm->isValid()) {
            $em->persist($auditPartOne);
            $em->flush();


            $this->addFlash('success', "Etape 1 enregistrée");
            return $this->redirectToRoute('auditPartTwo');
        }

        return $this->render("audit/auditPartOne.html.twig", [
            'partOneForm' => $partOneForm->createView(),
        ]);
    }

    /**
     * @Route("/audit/page2", name="auditPartTwo", methods={"GET","POST"})
     */
    public function partTwo(Request $request, EntityManagerInterface $em)
    {

        $newAuditPartTwo = new PartTwo;

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
        $deathLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Décès"]);
        $death->setGuaranteeLabel($deathLabel);

        $stopWorking = new Guarantee();
        $stopWorkingLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Arrêt de travail"]);
        $stopWorking->setGuaranteeLabel($stopWorkingLabel);

        $invalidity = new Guarantee();
        $invalidityLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Invalidité"]);
        $invalidity->setGuaranteeLabel($invalidityLabel);

        $complementaryHealth = new Guarantee();
        $complementaryHealthLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Complémentaire santé"]);
        $complementaryHealth->setGuaranteeLabel($complementaryHealthLabel);

        $dependency = new Guarantee();
        $dependencyLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Dépendances"]);
        $dependency->setGuaranteeLabel($dependencyLabel);

        $retirement = new Guarantee();
        $retirementLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Retraite ( PERP, Medelin, PERCO...)"]);
        $retirement->setGuaranteeLabel($retirementLabel);

        $childrenStudies = new Guarantee();
        $childrenStudiesLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Etudes et installation des enfants"]);
        $childrenStudies->setGuaranteeLabel($childrenStudiesLabel);

        $lifeAccidentGuarantee = new Guarantee();
        $lAGLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Garanties accidents de la vie"]);
        $lifeAccidentGuarantee->setGuaranteeLabel($lAGLabel);

        $juridicProtection = new Guarantee();
        $juridicProtectionLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Protection Juridique"]);
        $juridicProtection->setGuaranteeLabel($juridicProtectionLabel);

        $internetProtection = new Guarantee();
        $internetProtectionLabel = $guaranteeLabelRepo->findOneBy(["GuaranteeLabel" => "Protection internet/eCommerce"]);
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
        $nonCommercial->setIncomeLabel("Bénéfices non commerciaux");
        $industrial = new TotalAnnualIncome();
        $industrial->setIncomeLabel("Bénéfices industriels et commerciaux");
        $agricultural = new TotalAnnualIncome();
        $agricultural->setIncomeLabel("Bénéfices agricoles");
        $pension = new TotalAnnualIncome();
        $pension->setIncomeLabel("Pensions, retraites et rentres");
        $realEstate = new TotalAnnualIncome();
        $realEstate->setIncomeLabel("Revenus immobiliers");
        $movable = new TotalAnnualIncome();
        $movable->setIncomeLabel("Revenus mobiliers");
        $various = new TotalAnnualIncome();
        $various->setIncomeLabel("Revenus divers");

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

        if ($partTwoForm->isSubmitted() && $partTwoForm->isValid()) {
            $em->persist($newAuditPartTwo);
            $em->flush();


            $this->addFlash('success', "Etape 2 enregistrée");
            return $this->redirectToRoute('auditPartThree');
        }

        return $this->render("audit/part_two.html.twig", [
            'partTwoForm' => $partTwoForm->createView(),
            'guaranteeLabels' => $guaranteeLabels,
            "newAuditPartTwo" => $newAuditPartTwo,
            "death" => $death

        ]);
    }


    /**
     * @Route("/audit/page3", name="auditPartThree", methods={"GET","POST"})
     */
    public function partThree(Request $request, EntityManagerInterface $em)
    {
        $auditPartThree = new PartThree();

        $patrimonyLabelRepo = $this->getDoctrine()->getRepository(PatrimonyLabel::class);
        //récupération des labels pour les lister dans l'affichage
        $patrimonyLabels = $patrimonyLabelRepo->findAll();

        // ----- Instanciation des "patrimoines"

        //"Résidence principale"
        $principalResidence = new Patrimony();

        $principalResidenceLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Résidence principale"]);
        //on set l'instance $principalResidence avec le label "Résidence principale"
        $principalResidence->setPatrimonyLabel($principalResidenceLabel);


        //"Résidence secondaire"
        $secondHome = new Patrimony();
        $secondHomeLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Résidence secondaire"]);
        $secondHome->setPatrimonyLabel($secondHomeLabel);

        //"Autres Biens"
        $otherGoods = new Patrimony();
        $otherGoodsLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Autres Biens"]);
        $otherGoods->setPatrimonyLabel($otherGoodsLabel);

        //"Bien Locatif 1"
        $firstRentalProperty = new Patrimony();
        $firstRentalPropertyLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Bien Locatif 1"]);
        $firstRentalProperty->setPatrimonyLabel($firstRentalPropertyLabel);

        //"Bien Locatif 2"
        $secondRentalProperty = new Patrimony();
        $secondRentalPropertyLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Bien Locatif 2"]);
        $secondRentalProperty->setPatrimonyLabel($secondRentalPropertyLabel);

        //"Bien Locatif 3"
        $thirdRentalProperty = new Patrimony();
        $thirdRentalPropertyLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Bien Locatif 3"]);
        $thirdRentalProperty->setPatrimonyLabel($thirdRentalPropertyLabel);

        //"Pats de SCI ou SCPI"
        $sciScpi = new Patrimony();
        $sciScpiLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Pats de SCI ou SCPI"]);
        $sciScpi->setPatrimonyLabel($sciScpiLabel);

        //"Autres"
        $other = new Patrimony();
        $otherLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Autres"]);
        $other->setPatrimonyLabel($otherLabel);

        //"Immobilier professionnel"
        $ProfessionalRealEstate = new Patrimony();
        $ProfessionalRealEstateLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Immobilier professionnel"]);
        $ProfessionalRealEstate->setPatrimonyLabel($ProfessionalRealEstateLabel);

        //"Placement Foncier"
        $landPlacement = new Patrimony();
        $landPlacementLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Placement Foncier"]);
        $landPlacement->setPatrimonyLabel($landPlacementLabel);

        //"Objets: Meubles et Véhicules"
        $objects = new Patrimony();
        $objectsLabel = $patrimonyLabelRepo->findOneBy(["patrimonyLabel" => "Objet: Meubles et Véhicules"]);
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
        $cl1 = new CreditLeasing();
        $cl2 = new CreditLeasing();
        $cl3 = new CreditLeasing();
        $cl4 = new CreditLeasing();

        $auditPartThree->getCreditLeasing()->add($cl1);
        $auditPartThree->getCreditLeasing()->add($cl2);
        $auditPartThree->getCreditLeasing()->add($cl3);
        $auditPartThree->getCreditLeasing()->add($cl4);

        //création du formulaire partie 3
        $auditPartThreeForm = $this->createForm(PartThreeType::class, $auditPartThree);
        $auditPartThreeForm->handleRequest($request);


//        //Vérification de la soumission et de la validité du formulaire
        if ($auditPartThreeForm->isSubmitted() && $auditPartThreeForm->isValid()) {

            $em->persist($auditPartThree);
            $em->flush();


            $this->addFlash('success', "Etape 3 enregistrée");
            return $this->redirectToRoute('auditPartFour');
        }


        return $this->render("audit/part_three.html.twig", [
            "auditPartThreeForm" => $auditPartThreeForm->createview(),
            "patrimonyLabels" => $patrimonyLabels,
            "auditPartThree" => $auditPartThree,
        ]);
    }

    /**
     * @Route("/audit/page4", name="auditPartFour", methods={"GET","POST"})
     */
    public function partFour(Request $request, EntityManagerInterface $em)
    {
        $auditPartFour = new PartFour();

        $movableHeritageLabelRepo = $this->getDoctrine()->getRepository(MovableHeritageLabel::class);

        //récupération des labels pour les lister dans l'affichage
        $movableHeritageLabels = $movableHeritageLabelRepo->findAll();

        //Instanciation des "patrimoine mobilier"

        //Compte courant 1
        $currentAccountOne = new MovableHeritage();
        $currentAccountOneLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte courant 1"]);
        $currentAccountOne->setMovableHeritageLabel($currentAccountOneLabel);

        //Compte courant 2
        $currentAccountTwo = new MovableHeritage();
        $currentAccountTwoLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte courant 2"]);
        $currentAccountTwo->setMovableHeritageLabel($currentAccountTwoLabel);

        //Compte joint
        $jointAccount = new MovableHeritage();
        $jointAccountLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte joint"]);
        $jointAccount->setMovableHeritageLabel($jointAccountLabel);

        //Compte professionnel
        $proAccount = new MovableHeritage();
        $proAccountLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte professionnel"]);
        $proAccount->setMovableHeritageLabel($proAccountLabel);

        //Compte d'associés
        $associateAccount = new MovableHeritage();
        $associateAccountLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte d'associés"]);
        $associateAccount->setMovableHeritageLabel($associateAccountLabel);

        //PEL
        $pel = new MovableHeritage();
        $pelLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "PEL / CEL (plan épargne logement )"]);
        $pel->setMovableHeritageLabel($pelLabel);

        //Livret
        $booklet = new MovableHeritage();
        $bookletLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Livret (A, B, Bleu)"]);
        $booklet->setMovableHeritageLabel($bookletLabel);

        //LDD
        $ldd = new MovableHeritage();
        $lddLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "LDD( Livret développement durable )"]);
        $ldd->setMovableHeritageLabel($lddLabel);

        //Compte à termes
        $termAccount = new MovableHeritage();
        $termAccountLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte à termes"]);
        $termAccount->setMovableHeritageLabel($termAccountLabel);

        //Parts sociales
        $socialShares = new MovableHeritage();
        $socialSharesLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Parts sociales"]);
        $socialShares->setMovableHeritageLabel($socialSharesLabel);

        //Compte titre monétaire
        $monetarySecurityAccount = new MovableHeritage();
        $monetarySecurityAccountLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte titre monétaire"]);
        $monetarySecurityAccount->setMovableHeritageLabel($monetarySecurityAccountLabel);

        //Compte titre obligation
        $bondTitleAccount = new MovableHeritage();
        $bondTitleAccountLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte titre obligation"]);
        $bondTitleAccount->setMovableHeritageLabel($bondTitleAccountLabel);

        //Compte titre actions
        $equitySecurityAccount = new MovableHeritage();
        $equitySecurityAccountLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte titre actions"]);
        $equitySecurityAccount->setMovableHeritageLabel($equitySecurityAccountLabel);

        //Compte titre FCPI/FIP
        $fcpiSecuritiesAccount = new MovableHeritage();
        $fcpiSecuritiesAccountLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Compte titre FCPI / FIP"]);
        $fcpiSecuritiesAccount->setMovableHeritageLabel($fcpiSecuritiesAccountLabel);

        //PEA
        $pea = new MovableHeritage();
        $peaLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "PEA"]);
        $pea->setMovableHeritageLabel($peaLabel);

        //Assurance vie 1
        $lifeInsurance1 = new MovableHeritage();
        $lifeInsurance1Label = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Assurance vie 1"]);
        $lifeInsurance1->setMovableHeritageLabel($lifeInsurance1Label);

        //Assurance vie 2
        $lifeInsurance2 = new MovableHeritage();
        $lifeInsurance2Label = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Assurance vie 2"]);
        $lifeInsurance2->setMovableHeritageLabel($lifeInsurance2Label);

        //Assurance vie 3
        $lifeInsurance3 = new MovableHeritage();
        $lifeInsurance3Label = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Assurance vie 3"]);
        $lifeInsurance3->setMovableHeritageLabel($lifeInsurance3Label);

        //Assurance vie 4
        $lifeInsurance4 = new MovableHeritage();
        $lifeInsurance4Label = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Assurance vie 4"]);
        $lifeInsurance4->setMovableHeritageLabel($lifeInsurance4Label);

        //Plan d'Epargne Populaire
        $pep = new MovableHeritage();
        $pepLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Plan d'Epargne Populaire"]);
        $pep->setMovableHeritageLabel($pepLabel);

        //Stock options
        $stockOptions = new MovableHeritage();
        $stockOptionsLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Stock options"]);
        $stockOptions->setMovableHeritageLabel($stockOptionsLabel);

        //Ancien plan d'épargne entreprise
        // fcsp =  Former company savings plan
        $fcsp = new MovableHeritage();
        $fcspLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Ancien plan d'épargne entreprise"]);
        $fcsp->setMovableHeritageLabel($fcspLabel);

        //Autres
        $others = new MovableHeritage();
        $othersLabel = $movableHeritageLabelRepo->findOneBy(["movableHeritageLabel" => "Autres"]);
        $others->setMovableHeritageLabel($othersLabel);


        $auditPartFour->getMovableHeritage()->add($currentAccountOne);
        $auditPartFour->getMovableHeritage()->add($currentAccountTwo);
        $auditPartFour->getMovableHeritage()->add($jointAccount);
        $auditPartFour->getMovableHeritage()->add($proAccount);
        $auditPartFour->getMovableHeritage()->add($associateAccount);
        $auditPartFour->getMovableHeritage()->add($pel);
        $auditPartFour->getMovableHeritage()->add($booklet);
        $auditPartFour->getMovableHeritage()->add($ldd);
        $auditPartFour->getMovableHeritage()->add($termAccount);
        $auditPartFour->getMovableHeritage()->add($socialShares);
        $auditPartFour->getMovableHeritage()->add($monetarySecurityAccount);
        $auditPartFour->getMovableHeritage()->add($bondTitleAccount);
        $auditPartFour->getMovableHeritage()->add($equitySecurityAccount);
        $auditPartFour->getMovableHeritage()->add($fcpiSecuritiesAccount);
        $auditPartFour->getMovableHeritage()->add($pea);
        $auditPartFour->getMovableHeritage()->add($lifeInsurance1);
        $auditPartFour->getMovableHeritage()->add($lifeInsurance2);
        $auditPartFour->getMovableHeritage()->add($lifeInsurance3);
        $auditPartFour->getMovableHeritage()->add($lifeInsurance4);
        $auditPartFour->getMovableHeritage()->add($pep);
        $auditPartFour->getMovableHeritage()->add($stockOptions);
        $auditPartFour->getMovableHeritage()->add($fcsp);
        $auditPartFour->getMovableHeritage()->add($others);

        // Création du formulaire

        $auditPartFourForm = $this->createForm(PartFourType::class, $auditPartFour);
        $auditPartFourForm->handleRequest($request);

        if ($auditPartFourForm->isSubmitted() && $auditPartFourForm->isValid()) {
            $em->persist($auditPartFour);
            $em->flush();


            $this->addFlash('success', "Etape 4 enregistrée");
            return $this->redirectToRoute('auditPartFive');
        }
        return $this->render("audit/part_four.html.twig", [
            "movableHeritageLabels" => $movableHeritageLabels,
            "auditPartFourForm" => $auditPartFourForm->createView(),

        ]);
    }

    /**
     * @Route("/audit/page5", name="auditPartFive", methods={"GET","POST"})
     */
    public function partFive(Request $request, EntityManagerInterface $em)
    {
        $previousFinancialProductsRepo = $this->getDoctrine()->getRepository(PreviousFinancialProducts::class);
        $previousFinancialProducts = $previousFinancialProductsRepo->findAll();
        $financialInvestmentRepo = $this->getDoctrine()->getRepository(FinancialInvestment::class);
        $financialInvestments = $financialInvestmentRepo->findAll();
        $riskRepo = $this->getDoctrine()->getRepository(Risk::class);
        $risks = $riskRepo->findAll();
        $shareOfInvestmentRepo = $this->getDoctrine()->getRepository(ShareOfInvestment::class);
        $shareOfInvestments = $shareOfInvestmentRepo->findAll();
        $unplannedRepo = $this->getDoctrine()->getRepository(Unplanned::class);
        $unplanneds = $unplannedRepo->findAll();
        $dropReactionRepo = $this->getDoctrine()->getRepository(DropReaction::class);
        $dropReactions = $dropReactionRepo->findAll();
        $preferenceRepo = $this->getDoctrine()->getRepository(Preference::class);
        $preferences = $preferenceRepo->findAll();

        $auditPartFive = new PartFive();

        

        $auditPartFiveUser = new IndividualForm();

        $auditPartFivePartner = new IndividualForm();

        $auditPartFive->getIndividualForm()->add($auditPartFiveUser);
        $auditPartFive->getIndividualForm()->add($auditPartFivePartner);


        $partFiveForm = $this->createForm(PartFiveType::class, $auditPartFive);

        $partFiveForm->handleRequest($request);

        if ($partFiveForm->isSubmitted() && $partFiveForm->isValid()) {

            //To-Do Recupérer le le preference de death funds et verifier si il est null ou pas pour le user


            $em->persist($auditPartFive);
            $em->flush();


            $this->addFlash('success', "Etape 5 enregistrée");
            return $this->redirectToRoute("auditPartSix");
        }
        return $this->render("audit/part_five.html.twig", [

            "partFiveForm" => $partFiveForm->createView(),
            "previousFinancialProducts" => $previousFinancialProducts,
            "financialInvestments" => $financialInvestments,
            "risks" => $risks,
            "shareOfInvestments" => $shareOfInvestments,
            "unplanneds" => $unplanneds,
            "dropReactions" => $dropReactions,
            "preferences" => $preferences

        ]);
    }


    /**
     * @Route("/audit/page6", name="auditPartSix", methods={"GET","POST"})
     */
    public function partSix(Request $request, EntityManagerInterface $em)
    {
        //Instance de partSix
        $auditPartSix = new PartSix();

        //création des 4 instances de Recommendation
        $reco1 = new Recommendation();
        $reco2 = new Recommendation();
        $reco3 = new Recommendation();
        $reco4 = new Recommendation();

        //ajout des 4 reco à la collection
        $auditPartSix->getRecommendation()->add($reco1);
        $auditPartSix->getRecommendation()->add($reco2);
        $auditPartSix->getRecommendation()->add($reco3);
        $auditPartSix->getRecommendation()->add($reco4);

        //creation du formulaire
        $auditPartSixForm = $this->createForm(PartSixType::class, $auditPartSix);
        $auditPartSixForm->handleRequest($request);

        if ($auditPartSixForm->isSubmitted() && $auditPartSixForm->isValid()) {
            $em->persist($auditPartSix);
            $em->flush();

            $this->addFlash('success', "Etape 6 enregistrée");
            return $this->redirectToRoute('general');
        }

        return $this->render("audit/part_six.html.twig", [
            "auditPartSixForm" => $auditPartSixForm->createView(),
        ]);
    }

    /**
     * @Route("/audit/page7", name="auditPartSeven", methods={"GET","POST"})
     */
    public function partSeven(Request $request, EntityManagerInterface $em, SluggerInterface $slugger)
    {
        $auditPartSeven = new PartSeven();
        $document = new Documents();
        $user = $this->getUser();
        $username = $user->getName();
        $userId = $user->getId();

        $auditPartSevenForm = $this->createForm(PartSevenType::class, $document);
        $auditPartSevenForm->handleRequest($request);


        if ($auditPartSevenForm->isSubmitted() && $auditPartSevenForm->isValid()) {
            $files = $auditPartSevenForm->get('document')->getData();;

            // On boucle sur les images
            foreach ($files as $file) {
                // On génère un nouveau nom de fichier

                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $username.$userId.'-'.$safeFilename . '-' . uniqid() . '.' . $file->guessExtension();
                //Envoi de l'image dans le bon dossier
                try {
                    $file->move(
                        $this->getParameter('docUpload'),  // cf services.yaml -> parameters
                        $newFilename
                    );
                } catch (FileException $e) {
                    $e;
                }


                // On crée l'image dans la base de données
                $fileUpload = new Documents();
                $fileUpload->setDocument($newFilename);
                $auditPartSeven->addDocument($fileUpload);
                $em->persist($auditPartSeven);
                $em->flush();
            }


            //Ajout message flash + redirection
            $this->addFlash('success', "Vous avez terminé!!");
            return $this->redirectToRoute('general');
        }

        return $this->render("audit/part_seven.html.twig", ["auditPartSevenForm" => $auditPartSevenForm->createView(),]);

    }


}
