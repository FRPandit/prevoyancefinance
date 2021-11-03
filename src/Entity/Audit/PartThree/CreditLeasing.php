<?php

namespace App\Entity\Audit\PartThree;

use App\Repository\Audit\PartThree\CreditLeasingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreditLeasingRepository::class)
 */
class CreditLeasing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalRemaining;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $end;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $rate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mensuality;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coverFirstInsured;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coverSecondInsured;

    /**
     * @ORM\ManyToMany(targetEntity=PartThree::class, mappedBy="creditLeasing")
     */
    private $partThrees;

    public function __construct()
    {
        $this->partThrees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalRemaining(): ?int
    {
        return $this->totalRemaining;
    }

    public function setTotalRemaining(?int $totalRemaining): self
    {
        $this->totalRemaining = $totalRemaining;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(?\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getRate(): ?string
    {
        return $this->rate;
    }

    public function setRate(?string $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getMensuality(): ?int
    {
        return $this->mensuality;
    }

    public function setMensuality(?int $mensuality): self
    {
        $this->mensuality = $mensuality;

        return $this;
    }

    public function getCoverFirstInsured(): ?int
    {
        return $this->coverFirstInsured;
    }

    public function setCoverFirstInsured(?int $coverFirstInsured): self
    {
        $this->coverFirstInsured = $coverFirstInsured;

        return $this;
    }

    public function getCoverSecondInsured(): ?int
    {
        return $this->coverSecondInsured;
    }

    public function setCoverSecondInsured(?int $coverSecondInsured): self
    {
        $this->coverSecondInsured = $coverSecondInsured;

        return $this;
    }

    /**
     * @return Collection|PartThree[]
     */
    public function getPartThrees(): Collection
    {
        return $this->partThrees;
    }

    public function addPartThree(PartThree $partThree): self
    {
        if (!$this->partThrees->contains($partThree)) {
            $this->partThrees[] = $partThree;
            $partThree->addCreditLeasing($this);
        }

        return $this;
    }

    public function removePartThree(PartThree $partThree): self
    {
        if ($this->partThrees->removeElement($partThree)) {
            $partThree->removeCreditLeasing($this);
        }

        return $this;
    }
}
