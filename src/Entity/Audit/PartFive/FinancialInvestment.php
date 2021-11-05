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
     * @ORM\ManyToMany(targetEntity=IndividualForm::class, mappedBy="financialInvestment")
     */
    private $individualForms;

    public function __construct()
    {
        $this->individualForms = new ArrayCollection();
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
     * @return Collection|IndividualForm[]
     */
    public function getIndividualForms(): Collection
    {
        return $this->individualForms;
    }

    public function addIndividualForms(IndividualForm $individualForms): self
    {
        if (!$this->individualForms->contains($individualForms)) {
            $this->individualForms[] = $individualForms;
            $individualForms->addFinancialInvestment($this);
        }

        return $this;
    }

    public function removeIndividualForms(IndividualForm $individualForms): self
    {
        if ($this->individualForms->removeElement($individualForms)) {
            $individualForms->removeFinancialInvestment($this);
        }

        return $this;
    }

}
