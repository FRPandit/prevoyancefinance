<?php

namespace App\Entity\Audit\PartTwo;

use App\Repository\Audit\PartTwo\SavingsPlanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SavingsPlanRepository::class)
 */
class SavingsPlan
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
    private $savingsLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSavingsLabel(): ?string
    {
        return $this->savingsLabel;
    }

    public function setSavingsLabel(string $savingsLabel): self
    {
        $this->savingsLabel = $savingsLabel;

        return $this;
    }
}
