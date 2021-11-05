<?php

namespace App\Entity\Audit\PartSix;

use App\Repository\Audit\PartSix\RecommendationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecommendationRepository::class)
 */
class Recommendation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $job;

    /**
     * @ORM\Column(type="integer", nullable=true, nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $relationship;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $callingTimes;

    /**
     * @ORM\ManyToMany(targetEntity=PartSix::class, mappedBy="recommendation")
     */
    private $partSixes;

    public function __construct()
    {
        $this->partSixes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getRelationship(): ?string
    {
        return $this->relationship;
    }

    public function setRelationship(?string $relationship): self
    {
        $this->relationship = $relationship;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getCallingTimes(): ?string
    {
        return $this->callingTimes;
    }

    public function setCallingTimes(?string $callingTimes): self
    {
        $this->callingTimes = $callingTimes;

        return $this;
    }

    /**
     * @return Collection|PartSix[]
     */
    public function getPartSixes(): Collection
    {
        return $this->partSixes;
    }

    public function addPartSix(PartSix $partSix): self
    {
        if (!$this->partSixes->contains($partSix)) {
            $this->partSixes[] = $partSix;
            $partSix->addRecommendation($this);
        }

        return $this;
    }

    public function removePartSix(PartSix $partSix): self
    {
        if ($this->partSixes->removeElement($partSix)) {
            $partSix->removeRecommendation($this);
        }

        return $this;
    }
}
