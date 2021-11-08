<?php

namespace App\Entity\Audit\PartOne;

use App\Repository\Audit\PartOne\ChildrenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChildrenRepository::class)
 */
class Children
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yob;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $handicapped;

    /**
     * @ORM\ManyToMany(targetEntity=PartOne::class, mappedBy="children")
     */
    private $partOnes;

    public function __construct()
    {
        $this->partOnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYob(): ?int
    {
        return $this->yob;
    }

    public function setYob(?int $yob): self
    {
        $this->yob = $yob;

        return $this;
    }

    public function getHandicapped(): ?bool
    {
        return $this->handicapped;
    }

    public function setHandicapped(?bool $handicapped): self
    {
        $this->handicapped = $handicapped;

        return $this;
    }

    /**
     * @return Collection|PartOne[]
     */
    public function getPartOnes(): Collection
    {
        return $this->partOnes;
    }

    public function addPartOne(PartOne $partOne): self
    {
        if (!$this->partOnes->contains($partOne)) {
            $this->partOnes[] = $partOne;
            $partOne->addChild($this);
        }

        return $this;
    }

    public function removePartOne(PartOne $partOne): self
    {
        if ($this->partOnes->removeElement($partOne)) {
            $partOne->removeChild($this);
        }

        return $this;
    }
}
