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
     * @ORM\ManyToMany(targetEntity=PartFive::class, mappedBy="unplanned")
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
            $partFife->addUnplanned($this);
        }

        return $this;
    }

    public function removePartFife(PartFive $partFife): self
    {
        if ($this->partFives->removeElement($partFife)) {
            $partFife->removeUnplanned($this);
        }

        return $this;
    }
}
