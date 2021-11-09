<?php

namespace App\Entity\Audit\PartOne;

use App\Repository\Audit\PartOne\MariedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MariedRepository::class)
 */
class Maried
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
    private $communityBefore;

    /**
     * @ORM\Column(type="boolean")
     */
    private $communityAfter;

    /**
     * @ORM\Column(type="boolean")
     */
    private $separationOfProperty;

    /**
     * @ORM\Column(type="boolean")
     */
    private $partAcquisitions;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="boolean")
     */
    private $previousWedding;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommunityBefore(): ?bool
    {
        return $this->communityBefore;
    }

    public function setCommunityBefore(bool $communityBefore): self
    {
        $this->communityBefore = $communityBefore;

        return $this;
    }

    public function getCommunityAfter(): ?bool
    {
        return $this->communityAfter;
    }

    public function setCommunityAfter(bool $communityAfter): self
    {
        $this->communityAfter = $communityAfter;

        return $this;
    }

    public function getSeparationOfProperty(): ?bool
    {
        return $this->separationOfProperty;
    }

    public function setSeparationOfProperty(bool $separationOfProperty): self
    {
        $this->separationOfProperty = $separationOfProperty;

        return $this;
    }

    public function getPartAcquisitions(): ?bool
    {
        return $this->partAcquisitions;
    }

    public function setPartAcquisitions(bool $partAcquisitions): self
    {
        $this->partAcquisitions = $partAcquisitions;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPreviousWedding(): ?bool
    {
        return $this->previousWedding;
    }

    public function setPreviousWedding(bool $previousWedding): self
    {
        $this->previousWedding = $previousWedding;

        return $this;
    }
}
