<?php

namespace App\Entity\Audit;

use App\Repository\Audit\ProStatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProStatusRepository::class)
 */
class ProStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $proLabel;



    public function getProLabel(): ?string
    {
        return $this->proLabel;
    }

    public function setProLabel(?string $proLabel): self
    {
        $this->proLabel = $proLabel;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
