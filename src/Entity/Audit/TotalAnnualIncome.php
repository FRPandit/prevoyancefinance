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
    private $incomeName;



    /**
     * @ORM\ManyToMany(targetEntity=Salary::class, inversedBy="totalAnnualIncome")
     */
    private $salary;

    /**
     * @ORM\ManyToMany(targetEntity=PartTwo::class, mappedBy="totalAnnualIncome")
     */
    private $partTwo;

    public function __construct()
    {
        $this->partTwo = new ArrayCollection();
        $this->salary = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIncomeName(): ?string
    {
        return $this->incomeName;
    }

    public function setIncomeName(?string $incomeName): self
    {
        $this->incomeName = $incomeName;

        return $this;
    }


    /**
     * @return Collection|Salary[]
     */
    public function getSalary(): Collection
    {
        return $this->salary;
    }

    public function addSalary(Salary $salary): self
    {
        if (!$this->salary->contains($salary)) {
            $this->salary[] = $salary;
        }

        return $this;
    }

    public function removeSalary(Salary $salary): self
    {
        $this->salary->removeElement($salary);

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


}
