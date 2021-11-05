<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\UnplannedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UnplannedRepository::class)
 */
class Unplanned
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $unplLabel;

    /**
     * @ORM\ManyToMany(targetEntity=IndividualForm::class, mappedBy="unplanned")
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

    public function getUnplLabel(): ?string
    {
        return $this->unplLabel;
    }

    public function setUnplLabel(string $unplLabel): self
    {
        $this->unplLabel = $unplLabel;

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
            $individualForm->addUnplanned($this);
        }

        return $this;
    }

    public function removeIndividualForm(IndividualForm $individualForm): self
    {
        if ($this->individualForms->removeElement($individualForm)) {
            $individualForm->removeUnplanned($this);
        }

        return $this;
    }

}
