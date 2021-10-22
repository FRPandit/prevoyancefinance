<?php

namespace App\Entity\Audit;

use App\Repository\Audit\IntelligenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IntelligenceRepository::class)
 */
class Intelligence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $woman;

    /**
     * @ORM\Column(type="boolean")
     */
    private $man;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $nativeCountry;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $department;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $job;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $compagnyForm;

    /**
     * @ORM\Column(type="boolean")
     */
    private $axaCustomer;

    /**
     * @ORM\Column(type="integer")
     */
    private $socialSecurityNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWoman(): ?bool
    {
        return $this->woman;
    }

    public function setWoman(bool $woman): self
    {
        $this->woman = $woman;

        return $this;
    }

    public function getMan(): ?bool
    {
        return $this->man;
    }

    public function setMan(bool $man): self
    {
        $this->man = $man;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNativeCountry(): ?string
    {
        return $this->nativeCountry;
    }

    public function setNativeCountry(string $nativeCountry): self
    {
        $this->nativeCountry = $nativeCountry;

        return $this;
    }

    public function getDepartment(): ?string
    {
        return $this->department;
    }

    public function setDepartment(string $department): self
    {
        $this->department = $department;

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

    public function getCompagnyForm(): ?string
    {
        return $this->compagnyForm;
    }

    public function setCompagnyForm(string $compagnyForm): self
    {
        $this->compagnyForm = $compagnyForm;

        return $this;
    }

    public function getAxaCustomer(): ?bool
    {
        return $this->axaCustomer;
    }

    public function setAxaCustomer(bool $axaCustomer): self
    {
        $this->axaCustomer = $axaCustomer;

        return $this;
    }

    public function getSocialSecurityNumber(): ?int
    {
        return $this->socialSecurityNumber;
    }

    public function setSocialSecurityNumber(int $socialSecurityNumber): self
    {
        $this->socialSecurityNumber = $socialSecurityNumber;

        return $this;
    }
}
