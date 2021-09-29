<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $RoleLabel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoleLabel(): ?string
    {
        return $this->RoleLabel;
    }

    public function setRoleLabel(string $RoleLabel): self
    {
        $this->RoleLabel = $RoleLabel;

        return $this;
    }
}
