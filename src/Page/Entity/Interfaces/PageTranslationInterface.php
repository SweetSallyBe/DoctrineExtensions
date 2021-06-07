<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces;

interface PageTranslationInterface
{
    public function getId(): ?int;

    public function getCreatedAt(): ?\DateTimeInterface;

    public function getCreatedAtFormatted(): string;

    public function setCreatedAt(\DateTimeInterface $createdAt);

    public function getUpdatedAt(): ?\DateTimeInterface;

    public function getUpdatedAtFormatted(): string;

    public function setUpdatedAt(\DateTimeInterface $updatedAt);

    public function getLocale(): ?string;

    public function setLocale(string $locale);

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

    public function getPage(): ?PageInterface;

    public function setPage(?PageInterface $page);
}