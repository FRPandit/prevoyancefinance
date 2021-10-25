<?php

namespace App\Entity\Audit;

use App\Repository\Audit\SalaryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalaryRepository::class)
 */
class Salary
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $grossNet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getGrossNet(): ?bool
    {
        return $this->grossNet;
    }

    public function setGrossNet(?bool $grossNet): self
    {
        $this->grossNet = $grossNet;

        return $this;
    }


}
