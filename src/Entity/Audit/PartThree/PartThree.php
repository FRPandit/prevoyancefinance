<?php

namespace App\Entity\Audit\PartThree;

use App\Repository\Audit\PartThree\PartThreeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartThreeRepository::class)
 */
class PartThree
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
    private $haveCreditLeasing;

    /**
     * @ORM\Column(type="boolean")
     */
    private $project;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $needs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $trustedLawyer;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $legalSpecificity;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $lawFirm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHaveCreditLeasing(): ?bool
    {
        return $this->haveCreditLeasing;
    }

    public function setHaveCreditLeasing(bool $haveCreditLeasing): self
    {
        $this->haveCreditLeasing = $haveCreditLeasing;

        return $this;
    }

    public function getProject(): ?bool
    {
        return $this->project;
    }

    public function setProject(bool $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getNeeds(): ?string
    {
        return $this->needs;
    }

    public function setNeeds(string $needs): self
    {
        $this->needs = $needs;

        return $this;
    }

    public function getTrustedLawyer(): ?bool
    {
        return $this->trustedLawyer;
    }

    public function setTrustedLawyer(bool $trustedLawyer): self
    {
        $this->trustedLawyer = $trustedLawyer;

        return $this;
    }

    public function getLegalSpecificity(): ?string
    {
        return $this->legalSpecificity;
    }

    public function setLegalSpecificity(?string $legalSpecificity): self
    {
        $this->legalSpecificity = $legalSpecificity;

        return $this;
    }

    public function getLawFirm(): ?string
    {
        return $this->lawFirm;
    }

    public function setLawFirm(?string $lawFirm): self
    {
        $this->lawFirm = $lawFirm;

        return $this;
    }
}
