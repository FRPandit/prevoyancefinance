<?php

namespace App\Entity\Audit\PartFour;

use App\Repository\Audit\PartFour\MovableHeritageLabelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovableHeritageLabelRepository::class)
 */
class MovableHeritageLabel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $movableHeritageLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovableHeritageLabel(): ?string
    {
        return $this->movableHeritageLabel;
    }

    public function setMovableHeritageLabel(string $movableHeritageLabel): self
    {
        $this->movableHeritageLabel = $movableHeritageLabel;

        return $this;
    }
}
