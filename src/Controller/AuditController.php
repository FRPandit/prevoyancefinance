<?php

namespace App\Controller;


use App\Form\Audit\IncPartOne\ChildrenType;
use App\Form\Audit\IncPartOne\IntelligenceType;
use App\Form\Audit\PartOneType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        //----- Creation des Formulaires
        $partOneForm = $this->createForm(PartOneType::class);
 //       $childrenForm = $this->createForm(ChildrenType::class);
        $intelligenceForm = $this->createForm(IntelligenceType::class);



        return $this->render("audit/auditPartOne.html.twig", [
            'partOneForm' => $partOneForm->createView(),
 //           'childrenForm' => $childrenForm->createView(),
            'intelligenceForm' => $intelligenceForm->createView(),

        ]);
    }




}
