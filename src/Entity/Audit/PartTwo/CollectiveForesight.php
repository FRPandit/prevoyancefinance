<?php

namespace App\Entity\Audit\PartTwo;

use App\Repository\Audit\PartTwo\CollectiveForesightRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollectiveForesightRepository::class)
 */
class CollectiveForesight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $cfLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCfLabel(): ?string
    {
        return $this->cfLabel;
    }

    public function setCfLabel(string $cfLabel): self
    {
        $this->cfLabel = $cfLabel;

        return $this;
    }
}
