<?php

namespace App\Entity\Audit;

use App\Repository\Audit\FutureIncomeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FutureIncomeRepository::class)
 */
class FutureIncome
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $yearLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYearLabel(): ?string
    {
        return $this->yearLabel;
    }

    public function setYearLabel(string $yearLabel): self
    {
        $this->yearLabel = $yearLabel;

        return $this;
    }
}
