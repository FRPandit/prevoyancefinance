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
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $proLabel;

    /**
     * @ORM\ManyToOne(targetEntity=FutureIncome::class)
     */
    private $futureIncome;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProLabel(): ?string
    {
        return $this->proLabel;
    }

    public function setProLabel(?string $proLabel): self
    {
        $this->proLabel = $proLabel;

        return $this;
    }

    public function getFutureIncome(): ?FutureIncome
    {
        return $this->futureIncome;
    }

    public function setFutureIncome(?FutureIncome $futureIncome): self
    {
        $this->futureIncome = $futureIncome;

        return $this;
    }
}
