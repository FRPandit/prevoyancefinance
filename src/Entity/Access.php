<?php

namespace App\Entity;

use App\Repository\AccessRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccessRepository::class)
 */
class Access
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
    private $aLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getALabel(): ?string
    {
        return $this->aLabel;
    }

    public function setALabel(string $aLabel): self
    {
        $this->aLabel = $aLabel;

        return $this;
    }
}
