<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\ShareOfInvestmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShareOfInvestmentRepository::class)
 */
class ShareOfInvestment
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
    private $soiLabel;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoiLabel(): ?string
    {
        return $this->soiLabel;
    }

    public function setSoiLabel(string $soiLabel): self
    {
        $this->soiLabel = $soiLabel;

        return $this;
    }


}
