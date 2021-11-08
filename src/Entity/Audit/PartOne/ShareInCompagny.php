<?php

namespace App\Entity\Audit\PartOne;

use App\Repository\Audit\PartOne\ShareInCompagnyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShareInCompagnyRepository::class)
 */
class ShareInCompagny
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $shareLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShareLabel(): ?string
    {
        return $this->shareLabel;
    }

    public function setShareLabel(?string $shareLabel): self
    {
        $this->shareLabel = $shareLabel;

        return $this;
    }
}
