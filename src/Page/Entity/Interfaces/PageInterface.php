<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces;

use Doctrine\Common\Collections\Collection;

interface PageInterface
{
    public function getId(): ?int;

    public function getCreatedAt(): ?\DateTimeInterface;

    public function getCreatedAtFormatted(): string;

    public function setCreatedAt(\DateTimeInterface $createdAt);

    public function getUpdatedAt(): ?\DateTimeInterface;

    public function getUpdatedAtFormatted(): string;

    public function setUpdatedAt(\DateTimeInterface $updatedAt);

    public function getTranslations(): Collection;

    public function addTranslation(PageTranslationInterface $translation);

    public function removeTranslation(PageTranslationInterface $translation);

    public function getLocale(): ?string;

    public function getSlug(): ?string;

    public function setSlug(string $slug);

    public function getTitle(): ?string;

    public function setTitle(string $title);

    public function getHtmlTitle(): ?string;

    public function setHtmlTitle(string $htmlTitle);

    public function getDescription(): ?string;

    public function setDescription(?string $description);

    public function getHtmlDescription(): ?string;

    public function setHtmlDescription(?string $htmlDescription);

    public function getContent(): ?string;

    public function setContent(?string $content);
}