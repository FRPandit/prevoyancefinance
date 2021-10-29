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
    private $incomeLabel;

    /**
     * @ORM\ManyToOne(targetEntity=Salary::class)
     */
    private $salary;

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
}
