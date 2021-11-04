<?php

namespace App\Entity\Audit\PartSix;

use App\Repository\Audit\PartSix\PartSixRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartSixRepository::class)
 */
class PartSix
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
    private $singleMinIncome;

    /**
     * @ORM\Column(type="integer")
     */
    private $coupleMinIncome;

    /**
     * @ORM\Column(type="integer")
     */
    private $stopWorking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $retirementCapital;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $amountRetirementCapital;

    /**
     * @ORM\Column(type="boolean")
     */
    private $medicalHistory;

    /**
     * @ORM\Column(type="boolean")
     */
    private $familyMedicalHistory;

    /**
     * @ORM\Column(type="boolean")
     */
    private $smoking;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $stopSmoking;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cover;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $comment;

    /**
     * @ORM\Column(type="boolean")
     */
    private $haveReco;

    /**
     * @ORM\ManyToOne(targetEntity=FamilyNeeds::class, inversedBy="partSixes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $familyNeeds;

    /**
     * @ORM\ManyToOne(targetEntity=HealthNeeds::class, inversedBy="partSixes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $healthNeeds;

    /**
     * @ORM\ManyToMany(targetEntity=Recommendation::class, inversedBy="partSixes")
     */
    private $recommendation;



    public function __construct()
    {
        $this->recommendation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSingleMinIncome(): ?int
    {
        return $this->singleMinIncome;
    }

    public function setSingleMinIncome(int $singleMinIncome): self
    {
        $this->singleMinIncome = $singleMinIncome;

        return $this;
    }

    public function getCoupleMinIncome(): ?int
    {
        return $this->coupleMinIncome;
    }

    public function setCoupleMinIncome(int $coupleMinIncome): self
    {
        $this->coupleMinIncome = $coupleMinIncome;

        return $this;
    }

    public function getStopWorking(): ?int
    {
        return $this->stopWorking;
    }

    public function setStopWorking(int $stopWorking): self
    {
        $this->stopWorking = $stopWorking;

        return $this;
    }

    public function getRetirementCapital(): ?bool
    {
        return $this->retirementCapital;
    }

    public function setRetirementCapital(bool $retirementCapital): self
    {
        $this->retirementCapital = $retirementCapital;

        return $this;
    }

    public function getAmountRetirementCapital(): ?int
    {
        return $this->amountRetirementCapital;
    }

    public function setAmountRetirementCapital(int $amountRetirementCapital): self
    {
        $this->amountRetirementCapital = $amountRetirementCapital;

        return $this;
    }

    public function getMedicalHistory(): ?bool
    {
        return $this->medicalHistory;
    }

    public function setMedicalHistory(bool $medicalHistory): self
    {
        $this->medicalHistory = $medicalHistory;

        return $this;
    }

    public function getFamilyMedicalHistory(): ?bool
    {
        return $this->familyMedicalHistory;
    }

    public function setFamilyMedicalHistory(bool $familyMedicalHistory): self
    {
        $this->familyMedicalHistory = $familyMedicalHistory;

        return $this;
    }

    public function getSmoking(): ?bool
    {
        return $this->smoking;
    }

    public function setSmoking(bool $smoking): self
    {
        $this->smoking = $smoking;

        return $this;
    }

    public function getStopSmoking(): ?bool
    {
        return $this->stopSmoking;
    }

    public function setStopSmoking(?bool $stopSmoking): self
    {
        $this->stopSmoking = $stopSmoking;

        return $this;
    }

    public function getCover(): ?bool
    {
        return $this->cover;
    }

    public function setCover(bool $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getHaveReco(): ?bool
    {
        return $this->haveReco;
    }

    public function setHaveReco(bool $haveReco): self
    {
        $this->haveReco = $haveReco;

        return $this;
    }

    public function getFamilyNeeds(): ?FamilyNeeds
    {
        return $this->familyNeeds;
    }

    public function setFamilyNeeds(?FamilyNeeds $familyNeeds): self
    {
        $this->familyNeeds = $familyNeeds;

        return $this;
    }

    public function getHealthNeeds(): ?HealthNeeds
    {
        return $this->healthNeeds;
    }

    public function setHealthNeeds(?HealthNeeds $healthNeeds): self
    {
        $this->healthNeeds = $healthNeeds;

        return $this;
    }

    /**
     * @return Collection|Recommendation[]
     */
    public function getRecommendation(): Collection
    {
        return $this->recommendation;
    }

    public function addRecommendation(Recommendation $recommendation): self
    {
        if (!$this->recommendation->contains($recommendation)) {
            $this->recommendation[] = $recommendation;
        }

        return $this;
    }

    public function removeRecommendation(Recommendation $recommendation): self
    {
        $this->recommendation->removeElement($recommendation);

        return $this;
    }

}
