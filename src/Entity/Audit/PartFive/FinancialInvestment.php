<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\FinancialInvestmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FinancialInvestmentRepository::class)
 */
class FinancialInvestment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=90)
     */
    private $fiLabel;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFiLabel(): ?string
    {
        return $this->fiLabel;
    }

    public function setFiLabel(string $fiLabel): self
    {
        $this->fiLabel = $fiLabel;

        return $this;
    }


}
