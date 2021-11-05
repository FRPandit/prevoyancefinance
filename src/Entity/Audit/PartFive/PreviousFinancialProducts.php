<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\PreviousFinancialProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PreviousFinancialProductsRepository::class)
 */
class PreviousFinancialProducts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $pfpLabel;

    /**
     * @ORM\ManyToMany(targetEntity=IndividualForm::class, mappedBy="previousFinancialProducts")
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

    public function getPfpLabel(): ?string
    {
        return $this->pfpLabel;
    }

    public function setPfpLabel(string $pfpLabel): self
    {
        $this->pfpLabel = $pfpLabel;

        return $this;
    }

    /**
     * @return Collection|IndividualForm[]
     */
    public function getIndividualForms(): Collection
    {
        return $this->individualForms;
    }

    public function addIndividualForm(IndividualForm $individualForm): self
    {
        if (!$this->individualForms->contains($individualForm)) {
            $this->individualForms[] = $individualForm;
            $individualForm->addPreviousFinancialProduct($this);
        }

        return $this;
    }

    public function removeIndividualForm(IndividualForm $individualForm): self
    {
        if ($this->individualForms->removeElement($individualForm)) {
            $individualForm->removePreviousFinancialProduct($this);
        }

        return $this;
    }

}
