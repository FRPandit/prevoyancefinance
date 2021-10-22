<?php

namespace App\Entity\Audit;

use App\Repository\Audit\CollectiveRetirementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollectiveRetirementRepository::class)
 */
class CollectiveRetirement
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
    private $collectiveRetirementLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCollectiveRetirementLabel(): ?string
    {
        return $this->collectiveRetirementLabel;
    }

    public function setCollectiveRetirementLabel(string $collectiveRetirementLabel): self
    {
        $this->collectiveRetirementLabel = $collectiveRetirementLabel;

        return $this;
    }
}
