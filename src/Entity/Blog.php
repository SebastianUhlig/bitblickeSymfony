<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_url = null;

    #[ORM\ManyToOne(inversedBy: 'blogs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $author = null;

    #[ORM\OneToMany(mappedBy: 'blog', targetEntity: BlogComment::class)]
    private Collection $blogComments;

    public function __construct()
    {
        $this->blogComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(?string $image_url): static
    {
        $this->image_url = $image_url;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): static
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection<int, BlogComment>
     */
    public function getBlogComments(): Collection
    {
        return $this->blogComments;
    }

    public function addBlogComment(BlogComment $blogComment): static
    {
        if (!$this->blogComments->contains($blogComment)) {
            $this->blogComments->add($blogComment);
            $blogComment->setBlog($this);
        }

        return $this;
    }

    public function removeBlogComment(BlogComment $blogComment): static
    {
        if ($this->blogComments->removeElement($blogComment)) {
            // set the owning side to null (unless already changed)
            if ($blogComment->getBlog() === $this) {
                $blogComment->setBlog(null);
            }
        }

        return $this;
    }
}
