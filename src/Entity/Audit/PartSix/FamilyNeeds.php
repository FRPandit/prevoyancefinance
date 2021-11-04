<?php

namespace App\Entity\Audit\PartSix;

use App\Repository\Audit\PartSix\FamilyNeedsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamilyNeedsRepository::class)
 */
class FamilyNeeds
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $funeral;

    /**
     * @ORM\Column(type="integer")
     */
    private $incomeTaxes;

    /**
     * @ORM\Column(type="integer")
     */
    private $propertyTaxes;

    /**
     * @ORM\Column(type="integer")
     */
    private $housingTaxes;

    /**
     * @ORM\Column(type="integer")
     */
    private $torew;

    /**
     * @ORM\Column(type="integer")
     */
    private $professionalLoad;

    /**
     * @ORM\Column(type="integer")
     */
    private $corporateTaxes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $professionalVehicle;

    /**
     * @ORM\Column(type="integer")
     */
    private $spouseAdditionalCapital;

    /**
     * @ORM\Column(type="integer")
     */
    private $otherAdditionalCapital;

    /**
     * @ORM\Column(type="integer")
     */
    private $spouseSalary;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sufficientSalary;

    /**
     * @ORM\Column(type="boolean")
     */
    private $wwdc;

    /**
     * @ORM\Column(type="integer")
     */
    private $missingMonthlyIncome;

    /**
     * @ORM\OneToMany(targetEntity=PartSix::class, mappedBy="familyNeeds", orphanRemoval=true)
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

    public function getFuneral(): ?int
    {
        return $this->funeral;
    }

    public function setFuneral(int $funeral): self
    {
        $this->funeral = $funeral;

        return $this;
    }

    public function getIncomeTaxes(): ?int
    {
        return $this->incomeTaxes;
    }

    public function setIncomeTaxes(int $incomeTaxes): self
    {
        $this->incomeTaxes = $incomeTaxes;

        return $this;
    }

    public function getPropertyTaxes(): ?int
    {
        return $this->propertyTaxes;
    }

    public function setPropertyTaxes(int $propertyTaxes): self
    {
        $this->propertyTaxes = $propertyTaxes;

        return $this;
    }

    public function getHousingTaxes(): ?int
    {
        return $this->housingTaxes;
    }

    public function setHousingTaxes(int $housingTaxes): self
    {
        $this->housingTaxes = $housingTaxes;

        return $this;
    }

    public function getTorew(): ?int
    {
        return $this->torew;
    }

    public function setTorew(int $torew): self
    {
        $this->torew = $torew;

        return $this;
    }

    public function getProfessionalLoad(): ?int
    {
        return $this->professionalLoad;
    }

    public function setProfessionalLoad(int $professionalLoad): self
    {
        $this->professionalLoad = $professionalLoad;

        return $this;
    }

    public function getCorporateTaxes(): ?int
    {
        return $this->corporateTaxes;
    }

    public function setCorporateTaxes(int $corporateTaxes): self
    {
        $this->corporateTaxes = $corporateTaxes;

        return $this;
    }

    public function getProfessionalVehicle(): ?bool
    {
        return $this->professionalVehicle;
    }

    public function setProfessionalVehicle(bool $professionalVehicle): self
    {
        $this->professionalVehicle = $professionalVehicle;

        return $this;
    }

    public function getSpouseAdditionalCapital(): ?int
    {
        return $this->spouseAdditionalCapital;
    }

    public function setSpouseAdditionalCapital(int $spouseAdditionalCapital): self
    {
        $this->spouseAdditionalCapital = $spouseAdditionalCapital;

        return $this;
    }

    public function getOtherAdditionalCapital(): ?int
    {
        return $this->otherAdditionalCapital;
    }

    public function setOtherAdditionalCapital(int $otherAdditionalCapital): self
    {
        $this->otherAdditionalCapital = $otherAdditionalCapital;

        return $this;
    }

    public function getSpouseSalary(): ?int
    {
        return $this->spouseSalary;
    }

    public function setSpouseSalary(int $spouseSalary): self
    {
        $this->spouseSalary = $spouseSalary;

        return $this;
    }

    public function getSufficientSalary(): ?bool
    {
        return $this->sufficientSalary;
    }

    public function setSufficientSalary(bool $sufficientSalary): self
    {
        $this->sufficientSalary = $sufficientSalary;

        return $this;
    }

    public function getWwdc(): ?bool
    {
        return $this->wwdc;
    }

    public function setWwdc(bool $wwdc): self
    {
        $this->wwdc = $wwdc;

        return $this;
    }

    public function getMissingMonthlyIncome(): ?int
    {
        return $this->missingMonthlyIncome;
    }

    public function setMissingMonthlyIncome(int $missingMonthlyIncome): self
    {
        $this->missingMonthlyIncome = $missingMonthlyIncome;

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
            $partSix->setFamilyNeeds($this);
        }

        return $this;
    }

    public function removePartSix(PartSix $partSix): self
    {
        if ($this->partSixes->removeElement($partSix)) {
            // set the owning side to null (unless already changed)
            if ($partSix->getFamilyNeeds() === $this) {
                $partSix->setFamilyNeeds(null);
            }
        }

        return $this;
    }
}
