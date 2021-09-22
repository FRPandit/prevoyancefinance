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
    private $gLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGLabel(): ?string
    {
        return $this->gLabel;
    }

    public function setGLabel(?string $gLabel): self
    {
        $this->gLabel = $gLabel;

        return $this;
    }
}
