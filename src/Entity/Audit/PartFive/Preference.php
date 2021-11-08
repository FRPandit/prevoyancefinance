<?php

namespace App\Entity\Audit\PartFive;

use App\Repository\Audit\PartFive\PreferenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PreferenceRepository::class)
 */
class Preference
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $prefLabel;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrefLabel(): ?string
    {
        return $this->prefLabel;
    }

    public function setPrefLabel(string $prefLabel): self
    {
        $this->prefLabel = $prefLabel;

        return $this;
    }

}
