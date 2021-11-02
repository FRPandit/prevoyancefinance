<?php

namespace App\Entity\Audit\PartThree;

use App\Repository\Audit\PartThree\PatrimonyLabelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatrimonyLabelRepository::class)
 */
class PatrimonyLabel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $patrimonyLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatrimonyLabel(): ?string
    {
        return $this->patrimonyLabel;
    }

    public function setPatrimonyLabel(string $patrimonyLabel): self
    {
        $this->patrimonyLabel = $patrimonyLabel;

        return $this;
    }
}
