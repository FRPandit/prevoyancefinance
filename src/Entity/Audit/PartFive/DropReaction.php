<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\DropReactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DropReactionRepository::class)
 */
class DropReaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $dropLabel;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDropLabel(): ?string
    {
        return $this->dropLabel;
    }

    public function setDropLabel(string $dropLabel): self
    {
        $this->dropLabel = $dropLabel;

        return $this;
    }

}
