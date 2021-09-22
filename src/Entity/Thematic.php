<?php

namespace App\Entity;

use App\Repository\ThematicRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThematicRepository::class)
 */
class Thematic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $thLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThLabel(): ?string
    {
        return $this->thLabel;
    }

    public function setThLabel(string $thLabel): self
    {
        $this->thLabel = $thLabel;

        return $this;
    }
}
