<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Entity\Traits;

use SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces\PageInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait PageTranslationTrait
 *
 * @package SweetSallyBe\DoctrineExtensions\Page\Entity\Traits
 * @UniqueEntity (fields={"locale", "slug"})
 */
trait PageTranslationTrait
{
    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank
     */
    private ?string $locale;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private ?string $slug;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private ?string $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private ?string $htmlTitle;

    /**
     * @ORM\Column(type="string", length=2048, nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="string", length=2048, nullable=true)
     */
    private ?string $htmlDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $content;

    /**
     * @ORM\ManyToOne(targetEntity=Page::class, inversedBy="translations")
     * @ORM\JoinColumn(nullable=false)
     */
    protected ?PageInterface $page;

    public function __toString(): string
    {
        return $this->getTitle();
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getHtmlTitle(): ?string
    {
        return $this->htmlTitle;
    }

    public function setHtmlTitle(string $htmlTitle): self
    {
        $this->htmlTitle = $htmlTitle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getHtmlDescription(): ?string
    {
        return $this->htmlDescription;
    }

    public function setHtmlDescription(?string $htmlDescription): self
    {
        $this->htmlDescription = $htmlDescription;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPage(): ?PageInterface
    {
        return $this->page;
    }

    public function setPage(?PageInterface $page): self
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Slug starts with '/', routes do not
     */
    public function isSlug(): bool
    {
        return (($slugOrRoute = $this->getSlug())
            && ($firstChar = substr($slugOrRoute, 0, 1))
            && ($firstChar === '/')
        );
    }
}