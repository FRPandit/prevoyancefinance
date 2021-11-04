<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\FinancialInvestmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FinancialInvestmentRepository::class)
 */
class FinancialInvestment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $fiLabel;

    /**
     * @ORM\ManyToMany(targetEntity=PartFive::class, mappedBy="financialInvestment")
     */
    private $partFives;

    public function __construct()
    {
        $this->partFives = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFiLabel(): ?string
    {
        return $this->fiLabel;
    }

    public function setFiLabel(string $fiLabel): self
    {
        $this->fiLabel = $fiLabel;

        return $this;
    }

    /**
     * @return Collection|PartFive[]
     */
    public function getPartFives(): Collection
    {
        return $this->partFives;
    }

    public function addPartFife(PartFive $partFife): self
    {
        if (!$this->partFives->contains($partFife)) {
            $this->partFives[] = $partFife;
            $partFife->addFinancialInvestment($this);
        }

        return $this;
    }

    public function removePartFife(PartFive $partFife): self
    {
        if ($this->partFives->removeElement($partFife)) {
            $partFife->removeFinancialInvestment($this);
        }

        return $this;
    }
}
