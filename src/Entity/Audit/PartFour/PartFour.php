<?php

namespace App\Entity\Audit\PartFour;

use App\Repository\Audit\PartFour\PartFourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartFourRepository::class)
 */
class PartFour
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $mainBank;

    /**
     * @ORM\Column(type="boolean")
     */
    private $satisfaction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $adviceFrequency;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $missingService;

    /**
     * @ORM\Column(type="integer")
     */
    private $monthlySaving;

    /**
     * @ORM\Column(type="boolean")
     */
    private $openToProposals;

    /**
     * @ORM\ManyToMany(targetEntity=MovableHeritage::class, inversedBy="partFours")
     */
    private $movableHeritage;

    public function __construct()
    {
        $this->movableHeritage = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMainBank(): ?string
    {
        return $this->mainBank;
    }

    public function setMainBank(string $mainBank): self
    {
        $this->mainBank = $mainBank;

        return $this;
    }

    public function getSatisfaction(): ?bool
    {
        return $this->satisfaction;
    }

    public function setSatisfaction(bool $satisfaction): self
    {
        $this->satisfaction = $satisfaction;

        return $this;
    }

    public function getAdviceFrequency(): ?bool
    {
        return $this->adviceFrequency;
    }

    public function setAdviceFrequency(bool $adviceFrequency): self
    {
        $this->adviceFrequency = $adviceFrequency;

        return $this;
    }

    public function getMissingService(): ?string
    {
        return $this->missingService;
    }

    public function setMissingService(string $missingService): self
    {
        $this->missingService = $missingService;

        return $this;
    }

    public function getMonthlySaving(): ?int
    {
        return $this->monthlySaving;
    }

    public function setMonthlySaving(int $monthlySaving): self
    {
        $this->monthlySaving = $monthlySaving;

        return $this;
    }

    public function getOpenToProposals(): ?bool
    {
        return $this->openToProposals;
    }

    public function setOpenToProposals(bool $openToProposals): self
    {
        $this->openToProposals = $openToProposals;

        return $this;
    }

    /**
     * @return Collection|MovableHeritage[]
     */
    public function getMovableHeritage(): Collection
    {
        return $this->movableHeritage;
    }

    public function addMovableHeritage(MovableHeritage $movableHeritage): self
    {
        if (!$this->movableHeritage->contains($movableHeritage)) {
            $this->movableHeritage[] = $movableHeritage;
        }

        return $this;
    }

    public function removeMovableHeritage(MovableHeritage $movableHeritage): self
    {
        $this->movableHeritage->removeElement($movableHeritage);

        return $this;
    }
}
