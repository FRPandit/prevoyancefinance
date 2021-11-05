<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\PartFiveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartFiveRepository::class)
 */
class PartFive
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=IndividualForm::class, inversedBy="partFives", cascade={"persist"})
     */
    private $individualForm;

    public function __construct()
    {
        $this->individualForm = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|IndividualForm[]
     */
    public function getIndividualForm(): Collection
    {
        return $this->individualForm;
    }

    public function addIndividualForm(IndividualForm $individualForm): self
    {
        if (!$this->individualForm->contains($individualForm)) {
            $this->individualForm[] = $individualForm;
        }

        return $this;
    }

    public function removeIndividualForm(IndividualForm $individualForm): self
    {
        $this->individualForm->removeElement($individualForm);

        return $this;
    }
}
