<?php

namespace App\Entity\Audit;

use App\Entity\Status;
use App\Repository\Audit\PartOneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartOneRepository::class)
 */
class PartOne
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
    private $donation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $testament;

    /**
     * @ORM\Column(type="boolean")
     */
    private $notary;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $notaryName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $donationBetweenSpouses;

    /**
     * @ORM\ManyToOne(targetEntity=Objective::class , cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $objective;

    /**
     * @ORM\ManyToOne(targetEntity=Intelligence::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $intelligence;

    /**
     * @ORM\ManyToOne(targetEntity=ShareInCompagny::class)
     */
    private $shareInCompany;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Maried::class, cascade={"persist"})
     */
    private $maried;



    /**
     * @ORM\ManyToOne(targetEntity=ProStatus::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $proStatus;

    /**
     * @ORM\Column(type="boolean")
     */
    private $child;

    /**
     * @ORM\ManyToMany(targetEntity=Children::class, inversedBy="partOnes",cascade={"persist"})
     */
    private $children;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDonation(): ?bool
    {
        return $this->donation;
    }

    public function setDonation(bool $donation): self
    {
        $this->donation = $donation;

        return $this;
    }

    public function getTestament(): ?bool
    {
        return $this->testament;
    }

    public function setTestament(bool $testament): self
    {
        $this->testament = $testament;

        return $this;
    }

    public function getNotary(): ?bool
    {
        return $this->notary;
    }

    public function setNotary(bool $notary): self
    {
        $this->notary = $notary;

        return $this;
    }

    public function getNotaryName(): ?string
    {
        return $this->notaryName;
    }

    public function setNotaryName(string $notaryName): self
    {
        $this->notaryName = $notaryName;

        return $this;
    }

    public function getDonationBetweenSpouses(): ?bool
    {
        return $this->donationBetweenSpouses;
    }

    public function setDonationBetweenSpouses(bool $donationBetweenSpouses): self
    {
        $this->donationBetweenSpouses = $donationBetweenSpouses;

        return $this;
    }

    public function getObjective(): ?Objective
    {
        return $this->objective;
    }

    public function setObjective(?Objective $objective): self
    {
        $this->objective = $objective;

        return $this;
    }

    public function getIntelligence(): ?Intelligence
    {
        return $this->intelligence;
    }

    public function setIntelligence(?Intelligence $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getShareInCompany(): ?ShareInCompagny
    {
        return $this->shareInCompany;
    }

    public function setShareInCompany(?ShareInCompagny $shareInCompany): self
    {
        $this->shareInCompany = $shareInCompany;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getMaried(): ?Maried
    {
        return $this->maried;
    }

    public function setMaried(?Maried $maried): self
    {
        $this->maried = $maried;

        return $this;
    }



    public function getProStatus(): ?ProStatus
    {
        return $this->proStatus;
    }

    public function setProStatus(?ProStatus $proStatus): self
    {
        $this->proStatus = $proStatus;

        return $this;
    }

    public function getChild(): ?bool
    {
        return $this->child;
    }

    public function setChild(bool $child): self
    {
        $this->child = $child;

        return $this;
    }

    /**
     * @return Collection|Children[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(Children $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
        }

        return $this;
    }

    public function removeChild(Children $child): self
    {
        $this->children->removeElement($child);

        return $this;
    }

}
