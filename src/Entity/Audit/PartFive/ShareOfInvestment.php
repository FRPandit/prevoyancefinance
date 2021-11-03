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
     * @ORM\ManyToMany(targetEntity=PartFive::class, mappedBy="shareOfInvestment")
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
            $partFife->addShareOfInvestment($this);
        }

        return $this;
    }

    public function removePartFife(PartFive $partFife): self
    {
        if ($this->partFives->removeElement($partFife)) {
            $partFife->removeShareOfInvestment($this);
        }

        return $this;
    }
}
