<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aImg;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="article_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_id;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="article_id", orphanRemoval=true)
     */
    private $comment_id;

    /**
     * @ORM\ManyToOne(targetEntity=Access::class)
     */
    private $access_id;

    /**
     * @ORM\ManyToOne(targetEntity=Thematic::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $thematic_id;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $category_id;

    /**
     * @ORM\ManyToOne(targetEntity=State::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $stateLabel_id;

    /**
     * @ORM\Column(type="date")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $expDate;

    public function __construct()
    {
        $this->comment_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAImg(): ?string
    {
        return $this->aImg;
    }

    public function setAImg(?string $aImg): self
    {
        $this->aImg = $aImg;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

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
            $commentId->setArticleId($this);
        }

        return $this;
    }

    public function removeCommentId(Comment $commentId): self
    {
        if ($this->comment_id->removeElement($commentId)) {
            // set the owning side to null (unless already changed)
            if ($commentId->getArticleId() === $this) {
                $commentId->setArticleId(null);
            }
        }

        return $this;
    }

    public function getAccessId(): ?Access
    {
        return $this->access_id;
    }

    public function setAccessId(?Access $access_id): self
    {
        $this->access_id = $access_id;

        return $this;
    }

    public function getThematicId(): ?Thematic
    {
        return $this->thematic_id;
    }

    public function setThematicId(?Thematic $thematic_id): self
    {
        $this->thematic_id = $thematic_id;

        return $this;
    }

    public function getCategoryId(): ?Category
    {
        return $this->category_id;
    }

    public function setCategoryId(?Category $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getStateLabelId(): ?State
    {
        return $this->stateLabel_id;
    }

    public function setStateLabelId(?State $stateLabel_id): self
    {
        $this->stateLabel_id = $stateLabel_id;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getExpDate(): ?\DateTimeInterface
    {
        return $this->expDate;
    }

    public function setExpDate(?\DateTimeInterface $expDate): self
    {
        $this->expDate = $expDate;

        return $this;
    }
}
