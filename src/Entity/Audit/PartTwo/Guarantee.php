<?php

namespace App\Entity\Audit\PartTwo;

use App\Repository\Audit\PartTwo\GaranteeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity=GuaranteeLabel::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $guaranteeLabel;

    /**
     * @ORM\ManyToMany(targetEntity=PartTwo::class, mappedBy="Guarantee")
     */
    private $partTwo;

    public function __construct()
    {
        $this->partTwo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getGuaranteeLabel(): ?GuaranteeLabel
    {
        return $this->guaranteeLabel;
    }

    public function setGuaranteeLabel(?GuaranteeLabel $guaranteeLabel): self
    {
        $this->guaranteeLabel = $guaranteeLabel;

        return $this;
    }



    /**
     * @return Collection|PartTwo[]
     */
    public function getPartTwo(): Collection
    {
        return $this->partTwo;
    }

    public function addPartTwo(PartTwo $partTwo): self
    {
        if (!$this->partTwo->contains($partTwo)) {
            $this->partTwo[] = $partTwo;
            $partTwo->addGuarantee($this);
        }

        return $this;
    }

    public function removePartTwo(PartTwo $partTwo): self
    {
        if ($this->partTwo->removeElement($partTwo)) {
            $partTwo->removeGuarantee($this);
        }

        return $this;
    }
}
