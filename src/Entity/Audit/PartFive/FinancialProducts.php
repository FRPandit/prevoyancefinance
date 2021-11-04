<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\FinancialProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FinancialProductsRepository::class)
 */
class FinancialProducts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $nothing;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bankAccount;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $financialSavings;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lifeInsurance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lifeInsuranceUc;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $retirementInvestment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $retirementInvestmentUc;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $employeeSavings;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $employeeSavingsUc;

    /**
     * @ORM\ManyToMany(targetEntity=PartFive::class, mappedBy="financialProducts")
     */
    private $partFives;

    public function __construct()
    {
        $this->partFives = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNothing(): ?bool
    {
        return $this->nothing;
    }

    public function setNothing(?bool $nothing): self
    {
        $this->nothing = $nothing;

        return $this;
    }

    public function getBankAccount(): ?bool
    {
        return $this->bankAccount;
    }

    public function setBankAccount(?bool $bankAccount): self
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    public function getFinancialSavings(): ?bool
    {
        return $this->financialSavings;
    }

    public function setFinancialSavings(?bool $financialSavings): self
    {
        $this->financialSavings = $financialSavings;

        return $this;
    }

    public function getLifeInsurance(): ?bool
    {
        return $this->lifeInsurance;
    }

    public function setLifeInsurance(?bool $lifeInsurance): self
    {
        $this->lifeInsurance = $lifeInsurance;

        return $this;
    }

    public function getLifeInsuranceUc(): ?int
    {
        return $this->lifeInsuranceUc;
    }

    public function setLifeInsuranceUc(?int $lifeInsuranceUc): self
    {
        $this->lifeInsuranceUc = $lifeInsuranceUc;

        return $this;
    }

    public function getRetirementInvestment(): ?bool
    {
        return $this->retirementInvestment;
    }

    public function setRetirementInvestment(?bool $retirementInvestment): self
    {
        $this->retirementInvestment = $retirementInvestment;

        return $this;
    }

    public function getRetirementInvestmentUc(): ?int
    {
        return $this->retirementInvestmentUc;
    }

    public function setRetirementInvestmentUc(?int $retirementInvestmentUc): self
    {
        $this->retirementInvestmentUc = $retirementInvestmentUc;

        return $this;
    }

    public function getEmployeeSavings(): ?bool
    {
        return $this->employeeSavings;
    }

    public function setEmployeeSavings(?bool $employeeSavings): self
    {
        $this->employeeSavings = $employeeSavings;

        return $this;
    }

    public function getEmployeeSavingsUc(): ?int
    {
        return $this->employeeSavingsUc;
    }

    public function setEmployeeSavingsUc(?int $employeeSavingsUc): self
    {
        $this->employeeSavingsUc = $employeeSavingsUc;

        return $this;
    }

    /**
     * @return Collection|PartFive[]
     */
    public function getPartFives(): Collection
    {
        return $this->partFives;
    }

    public function addPartFife(PartFive $partFife): self
    {
        if (!$this->partFives->contains($partFife)) {
            $this->partFives[] = $partFife;
            $partFife->addFinancialProduct($this);
        }

        return $this;
    }

    public function removePartFife(PartFive $partFife): self
    {
        if ($this->partFives->removeElement($partFife)) {
            $partFife->removeFinancialProduct($this);
        }

        return $this;
    }
}
