<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\RiskRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RiskRepository::class)
 */
class Risk
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $riskLabel;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRiskLabel(): ?string
    {
        return $this->riskLabel;
    }

    public function setRiskLabel(string $riskLabel): self
    {
        $this->riskLabel = $riskLabel;

        return $this;
    }

}
