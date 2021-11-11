<?php

namespace App\Entity\Audit;

use App\Entity\Audit\PartFive\PartFive;
use App\Entity\Audit\PartFour\PartFour;
use App\Entity\Audit\PartOne\PartOne;
use App\Entity\Audit\PartSeven\PartSeven;
use App\Entity\Audit\PartSix\PartSix;
use App\Entity\Audit\PartThree\PartThree;
use App\Entity\Audit\PartTwo\PartTwo;
use App\Entity\User;
use App\Repository\Audit\AuditRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuditRepository::class)
 */
class Audit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PartOne::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $partOne;

    /**
     * @ORM\ManyToOne(targetEntity=PartTwo::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $partTwo;

    /**
     * @ORM\ManyToOne(targetEntity=PartThree::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $partThree;

    /**
     * @ORM\ManyToOne(targetEntity=PartFour::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $partFour;

    /**
     * @ORM\ManyToOne(targetEntity=PartFive::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $partFive;

    /**
     * @ORM\ManyToOne(targetEntity=PartSix::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $partSix;

    /**
     * @ORM\ManyToOne(targetEntity=PartSeven::class,cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $partSeven;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="audits",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartOne(): ?PartOne
    {
        return $this->partOne;
    }

    public function setPartOne(?PartOne $partOne): self
    {
        $this->partOne = $partOne;

        return $this;
    }

    public function getPartTwo(): ?PartTwo
    {
        return $this->partTwo;
    }

    public function setPartTwo(?PartTwo $partTwo): self
    {
        $this->partTwo = $partTwo;

        return $this;
    }

    public function getPartThree(): ?PartThree
    {
        return $this->partThree;
    }

    public function setPartThree(?PartThree $partThree): self
    {
        $this->partThree = $partThree;

        return $this;
    }

    public function getPartFour(): ?PartFour
    {
        return $this->partFour;
    }

    public function setPartFour(?PartFour $partFour): self
    {
        $this->partFour = $partFour;

        return $this;
    }

    public function getPartFive(): ?PartFive
    {
        return $this->partFive;
    }

    public function setPartFive(?PartFive $partFive): self
    {
        $this->partFive = $partFive;

        return $this;
    }

    public function getPartSix(): ?PartSix
    {
        return $this->partSix;
    }

    public function setPartSix(?PartSix $partSix): self
    {
        $this->partSix = $partSix;

        return $this;
    }

    public function getPartSeven(): ?PartSeven
    {
        return $this->partSeven;
    }

    public function setPartSeven(?PartSeven $partSeven): self
    {
        $this->partSeven = $partSeven;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


}
