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
     * @ORM\ManyToMany(targetEntity=PartFive::class, mappedBy="individualForm")
     */
    private $partFives;

    /**
     * @ORM\ManyToOne(targetEntity=FinancialProducts::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $financialProducts;

    /**
     * @ORM\ManyToOne(targetEntity=PreviousFinancialProducts::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $previousFinancialProducts;

    /**
     * @ORM\ManyToOne(targetEntity=FinancialInvestment::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $financialInvestment;

    /**
     * @ORM\ManyToOne(targetEntity=Risk::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $risk;

    /**
     * @ORM\ManyToOne(targetEntity=ShareOfInvestment::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $shareOfInvestment;

    /**
     * @ORM\ManyToOne(targetEntity=Unplanned::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $unplanned;

    /**
     * @ORM\ManyToOne(targetEntity=DropReaction::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $dropReaction;

    /**
     * @ORM\ManyToOne(targetEntity=Preference::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $preference;

    /**
     * @ORM\ManyToOne(targetEntity=DeathFunds::class,cascade={"persist"})
     */
    private $deathFunds;



    public function __construct()
    {

        $this->partFives = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPreviousFinancialProducts(): ?PreviousFinancialProducts
    {
        return $this->previousFinancialProducts;
    }

    public function setPreviousFinancialProducts(?PreviousFinancialProducts $previousFinancialProducts): self
    {
        $this->previousFinancialProducts = $previousFinancialProducts;

        return $this;
    }

    public function getFinancialProducts(): ?FinancialProducts
    {
        return $this->financialProducts;
    }

    public function setFinancialProducts(?FinancialProducts $financialProducts): self
    {
        $this->financialProducts = $financialProducts;

        return $this;
    }

    public function getFinancialInvestment(): ?FinancialInvestment
    {
        return $this->financialInvestment;
    }

    public function setFinancialInvestment(?FinancialInvestment $financialInvestment): self
    {
        $this->financialInvestment = $financialInvestment;

        return $this;
    }

    public function getRisk(): ?Risk
    {
        return $this->risk;
    }

    public function setRisk(?Risk $risk): self
    {
        $this->risk = $risk;

        return $this;
    }

    public function getShareOfInvestment(): ?ShareOfInvestment
    {
        return $this->shareOfInvestment;
    }

    public function setShareOfInvestment(?ShareOfInvestment $shareOfInvestment): self
    {
        $this->shareOfInvestment = $shareOfInvestment;

        return $this;
    }

    public function getUnplanned(): ?Unplanned
    {
        return $this->unplanned;
    }

    public function setUnplanned(?Unplanned $unplanned): self
    {
        $this->unplanned = $unplanned;

        return $this;
    }

    public function getDropReaction(): ?DropReaction
    {
        return $this->dropReaction;
    }

    public function setDropReaction(?DropReaction $dropReaction): self
    {
        $this->dropReaction = $dropReaction;

        return $this;
    }

    public function getPreference(): ?Preference
    {
        return $this->preference;
    }

    public function setPreference(?Preference $preference): self
    {
        $this->preference = $preference;

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
}
