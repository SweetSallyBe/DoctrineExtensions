<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces;

use App\Repository\PageBlockRepository;

interface PageBlockInterface
{
    public function getId(): ?int;

    public function getText(): ?string;

    public function setText(?string $text): self;

    public function getImage(): ?string;

    public function setImage(?string $image): self;

    public function getPageTranslation(): ?PageTranslationInterface;

    public function setPageTranslation(?PageTranslationInterface $pageTranslation): self;

    public function getUrl(): ?string;
    public function setUrl(?string $url): void;
}
