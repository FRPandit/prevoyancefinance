<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\IndividualFormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IndividualFormRepository::class)
 */
class IndividualForm
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=FinancialProducts::class, inversedBy="individualForms")
     */
    private $financialProducts;

    /**
     * @ORM\ManyToMany(targetEntity=PreviousFinancialProducts::class, inversedBy="individualForms")
     */
    private $previousFinancialProducts;

    /**
     * @ORM\ManyToMany(targetEntity=FinancialInvestment::class, inversedBy="invididualForms")
     */
    private $financialInvestment;

    /**
     * @ORM\ManyToMany(targetEntity=Risk::class, inversedBy="individualForms")
     */
    private $risk;

    /**
     * @ORM\ManyToMany(targetEntity=ShareOfInvestment::class, inversedBy="individualForms")
     */
    private $shareOfInvestments;

    /**
     * @ORM\ManyToMany(targetEntity=Unplanned::class, inversedBy="individualForms")
     */
    private $unplanned;

    /**
     * @ORM\ManyToMany(targetEntity=DropReaction::class, inversedBy="individualForms")
     */
    private $dropReaction;

    /**
     * @ORM\ManyToMany(targetEntity=Preference::class, inversedBy="individualForms")
     */
    private $preference;

    /**
     * @ORM\ManyToOne(targetEntity=DeathFunds::class, inversedBy="individualForms")
     */
    private $deathFunds;

    /**
     * @ORM\ManyToMany(targetEntity=PartFive::class, mappedBy="individualForm")
     */
    private $partFives;

    public function __construct()
    {
        $this->financialProducts = new ArrayCollection();
        $this->previousFinancialProducts = new ArrayCollection();
        $this->financialInvestment = new ArrayCollection();
        $this->risk = new ArrayCollection();
        $this->shareOfInvestments = new ArrayCollection();
        $this->unplanned = new ArrayCollection();
        $this->dropReaction = new ArrayCollection();
        $this->preference = new ArrayCollection();
        $this->partFives = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|FinancialProducts[]
     */
    public function getFinancialProducts(): Collection
    {
        return $this->financialProducts;
    }

    public function addFinancialProduct(FinancialProducts $financialProduct): self
    {
        if (!$this->financialProducts->contains($financialProduct)) {
            $this->financialProducts[] = $financialProduct;
        }

        return $this;
    }

    public function removeFinancialProduct(FinancialProducts $financialProduct): self
    {
        $this->financialProducts->removeElement($financialProduct);

        return $this;
    }

    /**
     * @return Collection|PreviousFinancialProducts[]
     */
    public function getPreviousFinancialProducts(): Collection
    {
        return $this->previousFinancialProducts;
    }

    public function addPreviousFinancialProduct(PreviousFinancialProducts $previousFinancialProduct): self
    {
        if (!$this->previousFinancialProducts->contains($previousFinancialProduct)) {
            $this->previousFinancialProducts[] = $previousFinancialProduct;
        }

        return $this;
    }

    public function removePreviousFinancialProduct(PreviousFinancialProducts $previousFinancialProduct): self
    {
        $this->previousFinancialProducts->removeElement($previousFinancialProduct);

        return $this;
    }

    /**
     * @return Collection|FinancialInvestment[]
     */
    public function getFinancialInvestment(): Collection
    {
        return $this->financialInvestment;
    }

    public function addFinancialInvestment(FinancialInvestment $financialInvestment): self
    {
        if (!$this->financialInvestment->contains($financialInvestment)) {
            $this->financialInvestment[] = $financialInvestment;
        }

        return $this;
    }

    public function removeFinancialInvestment(FinancialInvestment $financialInvestment): self
    {
        $this->financialInvestment->removeElement($financialInvestment);

        return $this;
    }

    /**
     * @return Collection|Risk[]
     */
    public function getRisk(): Collection
    {
        return $this->risk;
    }

    public function addRisk(Risk $risk): self
    {
        if (!$this->risk->contains($risk)) {
            $this->risk[] = $risk;
        }

        return $this;
    }

    public function removeRisk(Risk $risk): self
    {
        $this->risk->removeElement($risk);

        return $this;
    }

    /**
     * @return Collection|ShareOfInvestment[]
     */
    public function getShareOfInvestments(): Collection
    {
        return $this->shareOfInvestments;
    }

    public function addShareOfInvestment(ShareOfInvestment $shareOfInvestment): self
    {
        if (!$this->shareOfInvestments->contains($shareOfInvestment)) {
            $this->shareOfInvestments[] = $shareOfInvestment;
        }

        return $this;
    }

    public function removeShareOfInvestment(ShareOfInvestment $shareOfInvestment): self
    {
        $this->shareOfInvestments->removeElement($shareOfInvestment);

        return $this;
    }

    /**
     * @return Collection|Unplanned[]
     */
    public function getUnplanned(): Collection
    {
        return $this->unplanned;
    }

    public function addUnplanned(Unplanned $unplanned): self
    {
        if (!$this->unplanned->contains($unplanned)) {
            $this->unplanned[] = $unplanned;
        }

        return $this;
    }

    public function removeUnplanned(Unplanned $unplanned): self
    {
        $this->unplanned->removeElement($unplanned);

        return $this;
    }

    /**
     * @return Collection|DropReaction[]
     */
    public function getDropReaction(): Collection
    {
        return $this->dropReaction;
    }

    public function addDropReaction(DropReaction $dropReaction): self
    {
        if (!$this->dropReaction->contains($dropReaction)) {
            $this->dropReaction[] = $dropReaction;
        }

        return $this;
    }

    public function removeDropReaction(DropReaction $dropReaction): self
    {
        $this->dropReaction->removeElement($dropReaction);

        return $this;
    }

    /**
     * @return Collection|Preference[]
     */
    public function getPreference(): Collection
    {
        return $this->preference;
    }

    public function addPreference(Preference $preference): self
    {
        if (!$this->preference->contains($preference)) {
            $this->preference[] = $preference;
        }

        return $this;
    }

    public function removePreference(Preference $preference): self
    {
        $this->preference->removeElement($preference);

        return $this;
    }

    public function getDeathFunds(): ?DeathFunds
    {
        return $this->deathFunds;
    }

    public function setDeathFunds(?DeathFunds $deathFunds): self
    {
        $this->deathFunds = $deathFunds;

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
            $partFife->addIndividualForm($this);
        }

        return $this;
    }

    public function removePartFife(PartFive $partFife): self
    {
        if ($this->partFives->removeElement($partFife)) {
            $partFife->removeIndividualForm($this);
        }

        return $this;
    }
}
