<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\PreviousFinancialProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PreviousFinancialProductsRepository::class)
 */
class PreviousFinancialProducts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $pfpLabel;






    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPfpLabel(): ?string
    {
        return $this->pfpLabel;
    }

    public function setPfpLabel(string $pfpLabel): self
    {
        $this->pfpLabel = $pfpLabel;

        return $this;
    }



}
