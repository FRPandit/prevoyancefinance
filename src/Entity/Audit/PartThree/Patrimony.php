<?php

namespace App\Entity\Audit\PartThree;

use App\Repository\Audit\PartThree\PatrimonyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatrimonyRepository::class)
 */
class Patrimony
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $detainedBy;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $methodOfDetention;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $estimatedValue;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $acquisitionValue;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $taxation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rent;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sale;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $capitalOfRest;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $lender;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $borrowingDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $during;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $percentageOfInsurance;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $rate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetainedBy(): ?string
    {
        return $this->detainedBy;
    }

    public function setDetainedBy(?string $detainedBy): self
    {
        $this->detainedBy = $detainedBy;

        return $this;
    }

    public function getMethodOfDetention(): ?string
    {
        return $this->methodOfDetention;
    }

    public function setMethodOfDetention(?string $methodOfDetention): self
    {
        $this->methodOfDetention = $methodOfDetention;

        return $this;
    }

    public function getEstimatedValue(): ?int
    {
        return $this->estimatedValue;
    }

    public function setEstimatedValue(?int $estimatedValue): self
    {
        $this->estimatedValue = $estimatedValue;

        return $this;
    }

    public function getAcquisitionValue(): ?int
    {
        return $this->acquisitionValue;
    }

    public function setAcquisitionValue(?int $acquisitionValue): self
    {
        $this->acquisitionValue = $acquisitionValue;

        return $this;
    }

    public function getTaxation(): ?string
    {
        return $this->taxation;
    }

    public function setTaxation(?string $taxation): self
    {
        $this->taxation = $taxation;

        return $this;
    }

    public function getRent(): ?int
    {
        return $this->rent;
    }

    public function setRent(?int $rent): self
    {
        $this->rent = $rent;

        return $this;
    }

    public function getSale(): ?bool
    {
        return $this->sale;
    }

    public function setSale(?bool $sale): self
    {
        $this->sale = $sale;

        return $this;
    }

    public function getCapitalOfRest(): ?int
    {
        return $this->capitalOfRest;
    }

    public function setCapitalOfRest(?int $capitalOfRest): self
    {
        $this->capitalOfRest = $capitalOfRest;

        return $this;
    }

    public function getLender(): ?string
    {
        return $this->lender;
    }

    public function setLender(?string $lender): self
    {
        $this->lender = $lender;

        return $this;
    }

    public function getBorrowingDate(): ?\DateTimeInterface
    {
        return $this->borrowingDate;
    }

    public function setBorrowingDate(?\DateTimeInterface $borrowingDate): self
    {
        $this->borrowingDate = $borrowingDate;

        return $this;
    }

    public function getDuring(): ?int
    {
        return $this->during;
    }

    public function setDuring(?int $during): self
    {
        $this->during = $during;

        return $this;
    }

    public function getPercentageOfInsurance(): ?string
    {
        return $this->percentageOfInsurance;
    }

    public function setPercentageOfInsurance(?string $percentageOfInsurance): self
    {
        $this->percentageOfInsurance = $percentageOfInsurance;

        return $this;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(?string $rate): self
    {
        $this->rate = $rate;

        return $this;
    }
}
