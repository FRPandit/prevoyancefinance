<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pwd;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $mobile;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $mutualHealth;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $retirement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $foresight;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tax;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $saving;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $succession;

    /**
     * @ORM\Column(type="boolean")
     */
    private $admin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
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

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    public function setPwd(string $pwd): self
    {
        $this->pwd = $pwd;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getMutualHealth(): ?bool
    {
        return $this->mutualHealth;
    }

    public function setMutualHealth(?bool $mutualHealth): self
    {
        $this->mutualHealth = $mutualHealth;

        return $this;
    }

    public function getRetirement(): ?bool
    {
        return $this->retirement;
    }

    public function setRetirement(?bool $retirement): self
    {
        $this->retirement = $retirement;

        return $this;
    }

    public function getForesight(): ?bool
    {
        return $this->foresight;
    }

    public function setForesight(?bool $foresight): self
    {
        $this->foresight = $foresight;

        return $this;
    }

    public function getTax(): ?bool
    {
        return $this->tax;
    }

    public function setTax(?bool $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getSaving(): ?bool
    {
        return $this->saving;
    }

    public function setSaving(?bool $saving): self
    {
        $this->saving = $saving;

        return $this;
    }

    public function getSuccession(): ?bool
    {
        return $this->succession;
    }

    public function setSuccession(?bool $succession): self
    {
        $this->succession = $succession;

        return $this;
    }

    public function getAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }
}
