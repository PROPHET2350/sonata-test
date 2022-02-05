<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\InverseJoinColumn;
use Doctrine\ORM\Mapping\JoinColumn;

#[ORM\Entity(repositoryClass: BooksRepository::class)]
class Books
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $isbn;

    #[ORM\ManyToMany(targetEntity: Authors::class)]
    #[ORM\JoinTable(name: 'books_authors')]
    #[ORM\JoinColumn(name: 'book_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    #[ORM\InverseJoinColumn(name: 'author_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    /** @var Collection|Authors[] */
    private Collection $authors;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name ?? "Libro";
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

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * @return Collection|Authors[]
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(Authors $author): self
    {
        if (!$this->authors->contains($author)) {
            $this->authors[] = $author;
        }

        return $this;
    }

    public function removeAuthor(Authors $author): self
    {
        $this->authors->removeElement($author);

        return $this;
    }
}
