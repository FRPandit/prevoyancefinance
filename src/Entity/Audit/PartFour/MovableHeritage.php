<?php

namespace App\Entity\Audit\PartFour;

use App\Repository\Audit\PartFour\MovableHeritageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovableHeritageRepository::class)
 */
class MovableHeritage
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
     * @ORM\Column(type="date", nullable=true)
     */
    private $openDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $organization;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $interestRate;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $monthlyAnnualPayment;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $goal;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $beneficiary;

    /**
     * @ORM\ManyToMany(targetEntity=PartFour::class, mappedBy="movableHeritage")
     */
    private $partFours;

    /**
     * @ORM\ManyToOne(targetEntity=MovableHeritageLabel::class, inversedBy="movableHeritages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $movableHeritageLabel;

    public function __construct()
    {
        $this->partFours = new ArrayCollection();
    }

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

    public function getOpenDate(): ?\DateTimeInterface
    {
        return $this->openDate;
    }

    public function setOpenDate(?\DateTimeInterface $openDate): self
    {
        $this->openDate = $openDate;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(string $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    public function getInterestRate(): ?int
    {
        return $this->interestRate;
    }

    public function setInterestRate(?int $interestRate): self
    {
        $this->interestRate = $interestRate;

        return $this;
    }

    public function getMonthlyAnnualPayment(): ?string
    {
        return $this->monthlyAnnualPayment;
    }

    public function setMonthlyAnnualPayment(?string $monthlyAnnualPayment): self
    {
        $this->monthlyAnnualPayment = $monthlyAnnualPayment;

        return $this;
    }

    public function getGoal(): ?string
    {
        return $this->goal;
    }

    public function setGoal(?string $goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    public function getBeneficiary(): ?string
    {
        return $this->beneficiary;
    }

    public function setBeneficiary(?string $beneficiary): self
    {
        $this->beneficiary = $beneficiary;

        return $this;
    }

    /**
     * @return Collection|PartFour[]
     */
    public function getPartFours(): Collection
    {
        return $this->partFours;
    }

    public function addPartFour(PartFour $partFour): self
    {
        if (!$this->partFours->contains($partFour)) {
            $this->partFours[] = $partFour;
            $partFour->addMovableHeritage($this);
        }

        return $this;
    }

    public function removePartFour(PartFour $partFour): self
    {
        if ($this->partFours->removeElement($partFour)) {
            $partFour->removeMovableHeritage($this);
        }

        return $this;
    }

    public function getMovableHeritageLabel(): ?MovableHeritageLabel
    {
        return $this->movableHeritageLabel;
    }

    public function setMovableHeritageLabel(?MovableHeritageLabel $movableHeritageLabel): self
    {
        $this->movableHeritageLabel = $movableHeritageLabel;

        return $this;
    }
}
