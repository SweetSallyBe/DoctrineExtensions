<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces\PageTranslationInterface;
use SweetSallyBe\Helpers\Entity\AbstractEntity;

trait PageBlockTrait
{
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=PageTranslation::class, inversedBy="PageBlocks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pageTranslation;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPageTranslation(): ?PageTranslationInterface
    {
        return $this->pageTranslation;
    }

    public function setPageTranslation(?PageTranslationInterface $pageTranslation): self
    {
        $this->pageTranslation = $pageTranslation;

        return $this;
    }
}
