<?php

namespace App\Entity\Audit\PartSeven;

use App\Repository\Audit\PartSeven\DocumentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentsRepository::class)
 */
class Documents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $document;

    /**
     * @ORM\ManyToMany(targetEntity=PartSeven::class, mappedBy="documents", nullable =true)
     */
    private $partSevens;

    public function __construct()
    {
        $this->partSevens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(string $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return Collection|PartSeven[]
     */
    public function getPartSevens(): Collection
    {
        return $this->partSevens;
    }

    public function addPartSeven(PartSeven $partSeven): self
    {
        if (!$this->partSevens->contains($partSeven)) {
            $this->partSevens[] = $partSeven;
            $partSeven->addDocument($this);
        }

        return $this;
    }

    public function removePartSeven(PartSeven $partSeven): self
    {
        if ($this->partSevens->removeElement($partSeven)) {
            $partSeven->removeDocument($this);
        }

        return $this;
    }
}
