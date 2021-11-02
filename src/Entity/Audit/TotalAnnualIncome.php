<?php

namespace App\Entity\Audit;

use App\Repository\Audit\TotalAnnualIncomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TotalAnnualIncomeRepository::class)
 */
class TotalAnnualIncome
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $incomeLabel;



    /**
     * @ORM\ManyToMany(targetEntity=PartTwo::class, mappedBy="totalAnnualIncome")
     */
    private $partTwo;

    /**
     * @ORM\ManyToOne(targetEntity=Salary::class)
     */
    private $salary;

    public function __construct()
    {
        $this->partTwo = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIncomeLabel(): ?string
    {
        return $this->incomeLabel;
    }

    public function setIncomeLabel(?string $incomeLabel): self
    {
        $this->incomeLabel = $incomeLabel;

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
            $partTwo->addTotalAnnualIncome($this);
        }

        return $this;
    }

    public function removePartTwo(PartTwo $partTwo): self
    {
        if ($this->partTwo->removeElement($partTwo)) {
            $partTwo->removeTotalAnnualIncome($this);
        }

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


}
