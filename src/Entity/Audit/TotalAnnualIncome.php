<?php

namespace App\Entity\Audit;

use App\Repository\Audit\TotalAnnualIncomeRepository;
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
     * @ORM\ManyToOne(targetEntity=Salary::class)
     */
    private $salary;

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
