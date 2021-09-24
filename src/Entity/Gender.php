<?php

namespace App\Entity;

use App\Repository\GenderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenderRepository::class)
 */
class Gender
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $glabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGlabel(): ?string
    {
        return $this->glabel;
    }

    public function setGlabel(?string $glabel): self
    {
        $this->glabel = $glabel;

        return $this;
    }
}
