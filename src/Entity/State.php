<?php

namespace App\Entity;

use App\Repository\StateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StateRepository::class)
 */
class State
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $stateLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStateLabel(): ?string
    {
        return $this->stateLabel;
    }

    public function setStateLabel(string $stateLabel): self
    {
        $this->stateLabel = $stateLabel;

        return $this;
    }
}
