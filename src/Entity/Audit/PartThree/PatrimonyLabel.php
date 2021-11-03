<?php

namespace App\Entity\Audit\PartThree;

use App\Repository\Audit\PartThree\PatrimonyLabelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatrimonyLabelRepository::class)
 */
class PatrimonyLabel
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
    private $patrimonyLabel;

    /**
     * @ORM\OneToMany(targetEntity=Patrimony::class, mappedBy="patrimonyLabel", orphanRemoval=true)
     */
    private $patrimonies;

    public function __construct()
    {
        $this->patrimonies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatrimonyLabel(): ?string
    {
        return $this->patrimonyLabel;
    }

    public function setPatrimonyLabel(string $patrimonyLabel): self
    {
        $this->patrimonyLabel = $patrimonyLabel;

        return $this;
    }

    /**
     * @return Collection|Patrimony[]
     */
    public function getPatrimonies(): Collection
    {
        return $this->patrimonies;
    }

    public function addPatrimony(Patrimony $patrimony): self
    {
        if (!$this->patrimonies->contains($patrimony)) {
            $this->patrimonies[] = $patrimony;
            $patrimony->setPatrimonyLabel($this);
        }

        return $this;
    }

    public function removePatrimony(Patrimony $patrimony): self
    {
        if ($this->patrimonies->removeElement($patrimony)) {
            // set the owning side to null (unless already changed)
            if ($patrimony->getPatrimonyLabel() === $this) {
                $patrimony->setPatrimonyLabel(null);
            }
        }

        return $this;
    }
}
