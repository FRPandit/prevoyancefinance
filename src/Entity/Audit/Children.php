<?php

namespace App\Entity\Audit;

use App\Repository\Audit\ChildrenRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChildrenRepository::class)
 */
class Children
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
    private $child;

    /**
     * @ORM\Column(type="date")
     */
    private $yob;

    /**
     * @ORM\Column(type="boolean")
     */
    private $handicapped;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getYob(): ?\DateTimeInterface
    {
        return $this->yob;
    }

    public function setYob(\DateTimeInterface $yob): self
    {
        $this->yob = $yob;

        return $this;
    }

    public function getHandicapped(): ?bool
    {
        return $this->handicapped;
    }

    public function setHandicapped(bool $handicapped): self
    {
        $this->handicapped = $handicapped;

        return $this;
    }
}
