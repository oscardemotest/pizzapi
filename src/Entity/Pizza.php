<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PizzaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PizzaRepository::class)]
#[ApiResource]
class Pizza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 48)]
    private ?string $name = null;

    #[ORM\Column]
    private array $ingredients = [];

    #[ORM\Column(nullable: true)]
    private ?int $ovenTimeInSeconds = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?bool $special = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients): static
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getOvenTimeInSeconds(): ?int
    {
        return $this->ovenTimeInSeconds;
    }

    public function setOvenTimeInSeconds(?int $ovenTimeInSeconds): static
    {
        $this->ovenTimeInSeconds = $ovenTimeInSeconds;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function isSpecial(): ?bool
    {
        return $this->special;
    }

    public function setSpecial(bool $special): static
    {
        $this->special = $special;

        return $this;
    }
}
