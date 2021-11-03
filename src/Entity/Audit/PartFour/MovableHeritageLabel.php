<?php

namespace App\Entity\Audit\PartFour;

use App\Repository\Audit\PartFour\MovableHeritageLabelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovableHeritageLabelRepository::class)
 */
class MovableHeritageLabel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $movableHeritageLabel;

    /**
     * @ORM\OneToMany(targetEntity=MovableHeritage::class, mappedBy="movableHeritageLabel", orphanRemoval=true)
     */
    private $movableHeritages;

    public function __construct()
    {
        $this->movableHeritages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovableHeritageLabel(): ?string
    {
        return $this->movableHeritageLabel;
    }

    public function setMovableHeritageLabel(string $movableHeritageLabel): self
    {
        $this->movableHeritageLabel = $movableHeritageLabel;

        return $this;
    }

    /**
     * @return Collection|MovableHeritage[]
     */
    public function getMovableHeritages(): Collection
    {
        return $this->movableHeritages;
    }

    public function addMovableHeritage(MovableHeritage $movableHeritage): self
    {
        if (!$this->movableHeritages->contains($movableHeritage)) {
            $this->movableHeritages[] = $movableHeritage;
            $movableHeritage->setMovableHeritageLabel($this);
        }

        return $this;
    }

    public function removeMovableHeritage(MovableHeritage $movableHeritage): self
    {
        if ($this->movableHeritages->removeElement($movableHeritage)) {
            // set the owning side to null (unless already changed)
            if ($movableHeritage->getMovableHeritageLabel() === $this) {
                $movableHeritage->setMovableHeritageLabel(null);
            }
        }

        return $this;
    }
}
