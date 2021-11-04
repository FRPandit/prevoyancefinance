<?php

namespace App\Entity\Audit\PartSix;

use App\Repository\Audit\PartSix\HealthNeedsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HealthNeedsRepository::class)
 */
class HealthNeeds
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $mutualHealthSatisfaction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $glasses;

    /**
     * @ORM\Column(type="boolean")
     */
    private $dentalCare;

    /**
     * @ORM\Column(type="boolean")
     */
    private $feeOverruns;

    /**
     * @ORM\Column(type="boolean")
     */
    private $notReimbursed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $spaTreatment;

    /**
     * @ORM\OneToMany(targetEntity=PartSix::class, mappedBy="healthNeeds", orphanRemoval=true)
     */
    private $partSixes;

    public function __construct()
    {
        $this->partSixes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMutualHealthSatisfaction(): ?bool
    {
        return $this->mutualHealthSatisfaction;
    }

    public function setMutualHealthSatisfaction(bool $mutualHealthSatisfaction): self
    {
        $this->mutualHealthSatisfaction = $mutualHealthSatisfaction;

        return $this;
    }

    public function getGlasses(): ?bool
    {
        return $this->glasses;
    }

    public function setGlasses(bool $glasses): self
    {
        $this->glasses = $glasses;

        return $this;
    }

    public function getDentalCare(): ?bool
    {
        return $this->dentalCare;
    }

    public function setDentalCare(bool $dentalCare): self
    {
        $this->dentalCare = $dentalCare;

        return $this;
    }

    public function getFeeOverruns(): ?bool
    {
        return $this->feeOverruns;
    }

    public function setFeeOverruns(bool $feeOverruns): self
    {
        $this->feeOverruns = $feeOverruns;

        return $this;
    }

    public function getNotReimbursed(): ?bool
    {
        return $this->notReimbursed;
    }

    public function setNotReimbursed(bool $notReimbursed): self
    {
        $this->notReimbursed = $notReimbursed;

        return $this;
    }

    public function getSpaTreatment(): ?bool
    {
        return $this->spaTreatment;
    }

    public function setSpaTreatment(bool $spaTreatment): self
    {
        $this->spaTreatment = $spaTreatment;

        return $this;
    }



    /**
     * @return Collection|PartSix[]
     */
    public function getPartSixes(): Collection
    {
        return $this->partSixes;
    }

    public function addPartSix(PartSix $partSix): self
    {
        if (!$this->partSixes->contains($partSix)) {
            $this->partSixes[] = $partSix;
            $partSix->setHealthNeeds($this);
        }

        return $this;
    }

    public function removePartSix(PartSix $partSix): self
    {
        if ($this->partSixes->removeElement($partSix)) {
            // set the owning side to null (unless already changed)
            if ($partSix->getHealthNeeds() === $this) {
                $partSix->setHealthNeeds(null);
            }
        }

        return $this;
    }
}
