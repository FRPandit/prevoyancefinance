<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\UnplannedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UnplannedRepository::class)
 */
class Unplanned
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
    private $unplLabel;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnplLabel(): ?string
    {
        return $this->unplLabel;
    }

    public function setUnplLabel(string $unplLabel): self
    {
        $this->unplLabel = $unplLabel;

        return $this;
    }

}
