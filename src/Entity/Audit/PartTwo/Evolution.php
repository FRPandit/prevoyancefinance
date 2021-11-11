<?php

namespace App\Entity\Audit\PartTwo;

use App\Repository\Audit\PartTwo\EvolutionRepository;
use App\Entity\Audit\ProStatus;
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
    private $evolutionChoice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity=ProStatus::class )
     */
    private $proStatus;

    /**
     * @ORM\ManyToOne(targetEntity=Salary::class,cascade={"persist"})
     */
    private $salary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvolutionChoice(): ?bool
    {
        return $this->evolutionChoice;
    }

    public function setEvolutionChoice(bool $evolutionChoice): self
    {
        $this->evolutionChoice = $evolutionChoice;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
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
