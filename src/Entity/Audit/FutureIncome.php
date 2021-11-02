<?php

namespace App\Entity\Audit;

use App\Repository\Audit\FutureIncomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FutureIncomeRepository::class)
 */
class FutureIncome
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $yearLabel;


    /**
     * @ORM\ManyToOne(targetEntity=ProStatus::class)
     */
    private $proStatus;


    /**
     * @ORM\ManyToOne(targetEntity=Salary::class,cascade={"persist"})
     */
    private $salary;

    /**
     * @ORM\ManyToMany(targetEntity=PartTwo::class, mappedBy="futureIncome")
     */
    private $partTwo;

    public function __construct()
    {
        $this->partTwo = new ArrayCollection();

    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYearLabel(): ?string
    {
        return $this->yearLabel;
    }

    public function setYearLabel(string $yearLabel): self
    {
        $this->yearLabel = $yearLabel;

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
            $partTwo->addFutureIncome($this);
        }

        return $this;
    }

    public function removePartTwo(PartTwo $partTwo): self
    {
        if ($this->partTwo->removeElement($partTwo)) {
            $partTwo->removeFutureIncome($this);
        }

        return $this;
    }

}
