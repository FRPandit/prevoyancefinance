<?php

namespace App\Entity\Audit\PartOne;

use App\Repository\Audit\PartOne\ObjectiveRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjectiveRepository::class)
 */
class Objective
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $audit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $retirementSolution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $successionSolution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $foresightSolution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $savingSolution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $healthSolution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $taxSolution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $borrowerInsurance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAudit(): ?bool
    {
        return $this->audit;
    }

    public function setAudit(bool $audit): self
    {
        $this->audit = $audit;

        return $this;
    }

    public function getRetirementSolution(): ?bool
    {
        return $this->retirementSolution;
    }

    public function setRetirementSolution(bool $retirementSolution): self
    {
        $this->retirementSolution = $retirementSolution;

        return $this;
    }

    public function getSuccessionSolution(): ?bool
    {
        return $this->successionSolution;
    }

    public function setSuccessionSolution(bool $successionSolution): self
    {
        $this->successionSolution = $successionSolution;

        return $this;
    }

    public function getForesightSolution(): ?bool
    {
        return $this->foresightSolution;
    }

    public function setForesightSolution(bool $foresightSolution): self
    {
        $this->foresightSolution = $foresightSolution;

        return $this;
    }

    public function getSavingSolution(): ?bool
    {
        return $this->savingSolution;
    }

    public function setSavingSolution(bool $savingSolution): self
    {
        $this->savingSolution = $savingSolution;

        return $this;
    }

    public function getHealthSolution(): ?bool
    {
        return $this->healthSolution;
    }

    public function setHealthSolution(bool $healthSolution): self
    {
        $this->healthSolution = $healthSolution;

        return $this;
    }

    public function getTaxSolution(): ?bool
    {
        return $this->taxSolution;
    }

    public function setTaxSolution(bool $taxSolution): self
    {
        $this->taxSolution = $taxSolution;

        return $this;
    }

    public function getBorrowerInsurance(): ?bool
    {
        return $this->borrowerInsurance;
    }

    public function setBorrowerInsurance(bool $borrowerInsurance): self
    {
        $this->borrowerInsurance = $borrowerInsurance;

        return $this;
    }
}
