<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $admin;

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class)
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity=Address::class)
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="userAdmin")
     */
    private $article;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="user")
     */
    private $comment;

    public function __construct()
    {
        $this->article = new ArrayCollection();
        $this->comment = new ArrayCollection();
    }

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

    public function setPhone(?string $phone): self
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

    public function setAdmin(?bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->setUserAdmin($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->article->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getUserAdmin() === $this) {
                $article->setUserAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment[] = $comment;
            $comment->setUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUser() === $this) {
                $comment->setUser(null);
            }
        }

        return $this;
    }


}
