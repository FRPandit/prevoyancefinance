<?php

namespace App\Entity\Audit;

use App\Repository\Audit\GuaranteeLabelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GuaranteeLabelRepository::class)
 */
class GuaranteeLabel
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
    private $GuaranteeLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGuaranteeLabel(): ?string
    {
        return $this->GuaranteeLabel;
    }

    public function setGuaranteeLabel(string $GuaranteeLabel): self
    {
        $this->GuaranteeLabel = $GuaranteeLabel;

        return $this;
    }
}
