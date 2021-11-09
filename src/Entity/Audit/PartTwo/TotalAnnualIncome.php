<?php

namespace App\Entity\Audit\PartTwo;

use App\Repository\Audit\PartTwo\TotalAnnualIncomeRepository;
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
     * @ORM\ManyToOne(targetEntity=Salary::class, cascade={"persist"})
     */
    private $salary;

    /**
     * @ORM\ManyToMany(targetEntity=PartTwo::class, mappedBy="totalAnnualIncome")
     */
    private $partTwos;

    public function __construct()
    {
        $this->partTwos = new ArrayCollection();
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



    public function getSalary(): ?Salary
    {
        return $this->salary;
    }

    public function setSalary(?Salary $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * @return Collection|PartTwo[]
     */
    public function getPartTwos(): Collection
    {
        return $this->partTwos;
    }

    public function addPartTwo(PartTwo $partTwo): self
    {
        if (!$this->partTwos->contains($partTwo)) {
            $this->partTwos[] = $partTwo;
            $partTwo->addTotalAnnualIncome($this);
        }

        return $this;
    }

    public function removePartTwo(PartTwo $partTwo): self
    {
        if ($this->partTwos->removeElement($partTwo)) {
            $partTwo->removeTotalAnnualIncome($this);
        }

        return $this;
    }


}
