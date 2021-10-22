<?php

namespace App\Entity\Audit;

use App\Repository\Audit\EvolutionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvolutionRepository::class)
 */
class Evolution
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $evolution;

    /**
     * @ORM\Column(type="date")
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity=ProStatus::class)
     */
    private $proStatus;

    /**
     * @ORM\ManyToOne(targetEntity=Salary::class)
     */
    private $salary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvolution(): ?bool
    {
        return $this->evolution;
    }

    public function setEvolution(bool $evolution): self
    {
        $this->evolution = $evolution;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getProStatus(): ?ProStatus
    {
        return $this->proStatus;
    }

    public function setProStatus(?ProStatus $proStatus): self
    {
        $this->proStatus = $proStatus;

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
