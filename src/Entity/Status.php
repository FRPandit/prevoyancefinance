<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatusRepository::class)
 */
class Status
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $sLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSLabel(): ?string
    {
        return $this->sLabel;
    }

    public function setSLabel(?string $sLabel): self
    {
        $this->sLabel = $sLabel;

        return $this;
    }
}
