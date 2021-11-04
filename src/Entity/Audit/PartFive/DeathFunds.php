<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\DeathFundsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeathFundsRepository::class)
 */
class DeathFunds
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $consumption;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $acquisition;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amountAcquisition;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $investment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amountInvestment;

    /**
     * @ORM\Column(type="boolean")
     */
    private $preference;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $preferenceName;

    /**
     * @ORM\OneToMany(targetEntity=PartFive::class, mappedBy="deathFunds", orphanRemoval=true)
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

    public function getConsumption(): ?bool
    {
        return $this->consumption;
    }

    public function setConsumption(?bool $consumption): self
    {
        $this->consumption = $consumption;

        return $this;
    }

    public function getAcquisition(): ?bool
    {
        return $this->acquisition;
    }

    public function setAcquisition(?bool $acquisition): self
    {
        $this->acquisition = $acquisition;

        return $this;
    }

    public function getAmountAcquisition(): ?int
    {
        return $this->amountAcquisition;
    }

    public function setAmountAcquisition(?int $amountAcquisition): self
    {
        $this->amountAcquisition = $amountAcquisition;

        return $this;
    }

    public function getInvestment(): ?bool
    {
        return $this->investment;
    }

    public function setInvestment(?bool $investment): self
    {
        $this->investment = $investment;

        return $this;
    }

    public function getAmountInvestment(): ?int
    {
        return $this->amountInvestment;
    }

    public function setAmountInvestment(?int $amountInvestment): self
    {
        $this->amountInvestment = $amountInvestment;

        return $this;
    }

    public function getPreference(): ?bool
    {
        return $this->preference;
    }

    public function setPreference(bool $preference): self
    {
        $this->preference = $preference;

        return $this;
    }

    public function getPreferenceName(): ?string
    {
        return $this->preferenceName;
    }

    public function setPreferenceName(?string $preferenceName): self
    {
        $this->preferenceName = $preferenceName;

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
            $partFife->setDeathFunds($this);
        }

        return $this;
    }

    public function removePartFife(PartFive $partFife): self
    {
        if ($this->partFives->removeElement($partFife)) {
            // set the owning side to null (unless already changed)
            if ($partFife->getDeathFunds() === $this) {
                $partFife->setDeathFunds(null);
            }
        }

        return $this;
    }
}
