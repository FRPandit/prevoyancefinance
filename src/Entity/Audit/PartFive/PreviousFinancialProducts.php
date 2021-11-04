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
     * @ORM\ManyToMany(targetEntity=PartFive::class, mappedBy="previousFinancialProducts")
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
            $partFife->addPreviousFinancialProduct($this);
        }

        return $this;
    }

    public function removePartFife(PartFive $partFife): self
    {
        if ($this->partFives->removeElement($partFife)) {
            $partFife->removePreviousFinancialProduct($this);
        }

        return $this;
    }
}
