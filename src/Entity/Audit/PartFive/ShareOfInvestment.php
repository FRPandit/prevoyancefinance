<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\ShareOfInvestmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShareOfInvestmentRepository::class)
 */
class ShareOfInvestment
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
    private $soiLabel;

    /**
     * @ORM\ManyToMany(targetEntity=IndividualForm::class, mappedBy="shareOfInvestments")
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

    public function getSoiLabel(): ?string
    {
        return $this->soiLabel;
    }

    public function setSoiLabel(string $soiLabel): self
    {
        $this->soiLabel = $soiLabel;

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
            $individualForm->addShareOfInvestment($this);
        }

        return $this;
    }

    public function removeIndividualForm(IndividualForm $individualForm): self
    {
        if ($this->individualForms->removeElement($individualForm)) {
            $individualForm->removeShareOfInvestment($this);
        }

        return $this;
    }

}
