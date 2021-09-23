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

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class)
     */
    private $gender_id;

    /**
     * @ORM\ManyToOne(targetEntity=Address::class)
     */
    private $address_id;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class)
     */
    private $status_id;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="user_id")
     */
    private $article_id;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="uComment_id")
     */
    private $comment_id;

    public function __construct()
    {
        $this->article_id = new ArrayCollection();
        $this->comment_id = new ArrayCollection();
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

    public function getGenderId(): ?Gender
    {
        return $this->gender_id;
    }

    public function setGenderId(?Gender $gender_id): self
    {
        $this->gender_id = $gender_id;

        return $this;
    }

    public function getAddressId(): ?Address
    {
        return $this->address_id;
    }

    public function setAddressId(?Address $address_id): self
    {
        $this->address_id = $address_id;

        return $this;
    }

    public function getStatusId(): ?Status
    {
        return $this->status_id;
    }

    public function setStatusId(?Status $status_id): self
    {
        $this->status_id = $status_id;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticleId(): Collection
    {
        return $this->article_id;
    }

    public function addArticleId(Article $articleId): self
    {
        if (!$this->article_id->contains($articleId)) {
            $this->article_id[] = $articleId;
            $articleId->setUserId($this);
        }

        return $this;
    }

    public function removeArticleId(Article $articleId): self
    {
        if ($this->article_id->removeElement($articleId)) {
            // set the owning side to null (unless already changed)
            if ($articleId->getUserId() === $this) {
                $articleId->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getCommentId(): Collection
    {
        return $this->comment_id;
    }

    public function addCommentId(Comment $commentId): self
    {
        if (!$this->comment_id->contains($commentId)) {
            $this->comment_id[] = $commentId;
            $commentId->setUCommentId($this);
        }

        return $this;
    }

    public function removeCommentId(Comment $commentId): self
    {
        if ($this->comment_id->removeElement($commentId)) {
            // set the owning side to null (unless already changed)
            if ($commentId->getUCommentId() === $this) {
                $commentId->setUCommentId(null);
            }
        }

        return $this;
    }
}
