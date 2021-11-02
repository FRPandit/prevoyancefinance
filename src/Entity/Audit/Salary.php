<?php

namespace App\Entity\Audit;

use App\Repository\Audit\SalaryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalaryRepository::class)
 */
class Salary
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $grossNet;

    /**
     * @ORM\ManyToMany(targetEntity=TotalAnnualIncome::class, mappedBy="salary")
     */
    private $totalAnnualIncome;

    public function __construct()
    {
        $this->totalAnnualIncome = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getGrossNet(): ?bool
    {
        return $this->grossNet;
    }

    public function setGrossNet(?bool $grossNet): self
    {
        $this->grossNet = $grossNet;

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
            $totalAnnualIncome->addSalary($this);
        }

        return $this;
    }

    public function removeTotalAnnualIncome(TotalAnnualIncome $totalAnnualIncome): self
    {
        if ($this->totalAnnualIncome->removeElement($totalAnnualIncome)) {
            $totalAnnualIncome->removeSalary($this);
        }

        return $this;
    }


}
