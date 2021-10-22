<?php

namespace App\Entity\Audit;

use App\Repository\Audit\GaranteeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GaranteeRepository::class)
 */
class Guarantee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $company;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amountOfGuarantees;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contribution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $madelin;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $beneficiaries;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getAmountOfGuarantees(): ?int
    {
        return $this->amountOfGuarantees;
    }

    public function setAmountOfGuarantees(?int $amountOfGuarantees): self
    {
        $this->amountOfGuarantees = $amountOfGuarantees;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getContribution(): ?int
    {
        return $this->contribution;
    }

    public function setContribution(?int $contribution): self
    {
        $this->contribution = $contribution;

        return $this;
    }

    public function getMadelin(): ?bool
    {
        return $this->madelin;
    }

    public function setMadelin(bool $madelin): self
    {
        $this->madelin = $madelin;

        return $this;
    }

    public function getBeneficiaries(): ?string
    {
        return $this->beneficiaries;
    }

    public function setBeneficiaries(?string $beneficiaries): self
    {
        $this->beneficiaries = $beneficiaries;

        return $this;
    }
}
