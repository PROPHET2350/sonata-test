<?php

namespace App\Entity;

use App\Repository\AuthorsRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorsRepository::class)]
class Authors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $dni;

    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $creationDate;

    public function __construct(string $name, string $dni, DateTimeInterface $creationDate)
    {
        $this->name = $name;
        $this->dni = $dni;
        $this->creationDate = $creationDate;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function getCreationDate(): ?DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? "Author";
    }
}
