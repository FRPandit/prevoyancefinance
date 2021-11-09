<?php

namespace App\Entity\Audit\PartTwo;

use App\Repository\Audit\PartTwo\PartTwoRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartTwoRepository::class)
 */
class PartTwo
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
    private $activeCompanySavingsPlan;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $actualSaving;

    /**
     * @ORM\Column(type="boolean")
     */
    private $contributionClass;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $contributionClassLabel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $trustedAccount;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $trustedAccountName;

    /**
     * @ORM\ManyToOne(targetEntity=CollectiveForesight::class)
     * @ORM\JoinColumn (nullable=true)
     */
    private $collectiveForesight;

    /**
     * @ORM\ManyToOne(targetEntity=SavingsPlan::class)
     */
    private $savingsPlan;

    /**
     * @ORM\ManyToOne(targetEntity=CollectiveRetirement::class)
     */
    private $collectiveRetirement;


    /**
     * @ORM\ManyToOne(targetEntity=Evolution::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $evolution;


    /**
     * @ORM\ManyToOne(targetEntity=Salary::class,inversedBy="partTwo",cascade={"persist"}))
     * @ORM\JoinColumn(nullable=false)
     */
    private $salary;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $ableToMeasure;

    /**
     * @ORM\ManyToMany(targetEntity=Guarantee::class, inversedBy="partTwo",cascade={"persist"})
     */
    private $guarantee;

    /**
     * @ORM\ManyToMany(targetEntity=FutureIncome::class, inversedBy="partTwo",cascade={"persist"})
     */
    private $futureIncome;

    /**
     * @ORM\ManyToMany(targetEntity=TotalAnnualIncome::class, inversedBy="partTwos", cascade={"persist"})
     */
    private $totalAnnualIncome;



    public function __construct()
    {
        $this->guarantee = new ArrayCollection();
        $this->futureIncome = new ArrayCollection();
        $this->totalAnnualIncome = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActiveCompanySavingsPlan(): ?bool
    {
        return $this->activeCompanySavingsPlan;
    }

    public function setActiveCompanySavingsPlan(?bool $activeCompanySavingsPlan): self
    {
        $this->activeCompanySavingsPlan = $activeCompanySavingsPlan;

        return $this;
    }

    public function getActualSaving(): ?int
    {
        return $this->actualSaving;
    }

    public function setActualSaving(int $actualSaving): self
    {
        $this->actualSaving = $actualSaving;

        return $this;
    }

    public function getContributionClass(): ?bool
    {
        return $this->contributionClass;
    }

    public function setContributionClass(bool $contributionClass): self
    {
        $this->contributionClass = $contributionClass;

        return $this;
    }

    public function getContributionClassLabel(): ?string
    {
        return $this->contributionClassLabel;
    }

    public function setContributionClassLabel(string $contributionClassLabel): self
    {
        $this->contributionClassLabel = $contributionClassLabel;

        return $this;
    }

    public function getTrustedAccount(): ?bool
    {
        return $this->trustedAccount;
    }

    public function setTrustedAccount(bool $trustedAccount): self
    {
        $this->trustedAccount = $trustedAccount;

        return $this;
    }

    public function getTrustedAccountName(): ?string
    {
        return $this->trustedAccountName;
    }

    public function setTrustedAccountName(?string $trustedAccountName): self
    {
        $this->trustedAccountName = $trustedAccountName;

        return $this;
    }

    public function getCollectiveForesight(): ?CollectiveForesight
    {
        return $this->collectiveForesight;
    }

    public function setCollectiveForesight(?CollectiveForesight $collectiveForesight): self
    {
        $this->collectiveForesight = $collectiveForesight;

        return $this;
    }

    public function getSavingsPlan(): ?SavingsPlan
    {
        return $this->savingsPlan;
    }

    public function setSavingsPlan(?SavingsPlan $savingsPlan): self
    {
        $this->savingsPlan = $savingsPlan;

        return $this;
    }

    public function getCollectiveRetirement(): ?CollectiveRetirement
    {
        return $this->collectiveRetirement;
    }

    public function setCollectiveRetirement(?CollectiveRetirement $collectiveRetirement): self
    {
        $this->collectiveRetirement = $collectiveRetirement;

        return $this;
    }

    public function getGuarantee(): ArrayCollection
    {
        return $this->guarantee;
    }

    public function setGuarantee(?Guarantee $guarantee): self
    {
        $this->guarantee = $guarantee;

        return $this;
    }

    public function getEvolution(): ?Evolution
    {
        return $this->evolution;
    }

    public function setEvolution(?Evolution $evolution): self
    {
        $this->evolution = $evolution;

        return $this;
    }


    public function getSalary(): ?Salary
    {
        return $this->salary;
    }

    public function setSalary(?Salary $salary): self
    {
        $this->salary = $salary;

        return $this;
    }


    public function getAbleToMeasure(): ?string
    {
        return $this->ableToMeasure;
    }

    public function setAbleToMeasure(string $ableToMeasure): self
    {
        $this->ableToMeasure = $ableToMeasure;

        return $this;
    }

    public function addGuarantee(Guarantee $guarantee): self
    {
        if (!$this->guarantee->contains($guarantee)) {
            $this->guarantee[] = $guarantee;
        }

        return $this;
    }

    public function removeGuarantee(Guarantee $guarantee): self
    {
        $this->guarantee->removeElement($guarantee);

        return $this;
    }

    /**
     * @return Collection|FutureIncome[]
     */
    public function getFutureIncome(): Collection
    {
        return $this->futureIncome;
    }

    public function addFutureIncome(FutureIncome $futureIncome): self
    {
        if (!$this->futureIncome->contains($futureIncome)) {
            $this->futureIncome[] = $futureIncome;
        }

        return $this;
    }

    public function removeFutureIncome(FutureIncome $futureIncome): self
    {
        $this->futureIncome->removeElement($futureIncome);

        return $this;
    }

    /**
     * @return Collection|TotalAnnualIncome[]
     */
    public function getTotalAnnualIncome(): Collection
    {
        return $this->totalAnnualIncome;
    }

    public function addTotalAnnualIncome(TotalAnnualIncome $totalAnnualIncome): self
    {
        if (!$this->totalAnnualIncome->contains($totalAnnualIncome)) {
            $this->totalAnnualIncome[] = $totalAnnualIncome;
        }

        return $this;
    }

    public function removeTotalAnnualIncome(TotalAnnualIncome $totalAnnualIncome): self
    {
        $this->totalAnnualIncome->removeElement($totalAnnualIncome);

        return $this;
    }




}
