<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Entity\Traits;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces\PageTranslationInterface;
use Symfony\Component\Validator\Constraints as Assert;

trait PageTrait
{
    /**
     * @ORM\OneToMany(targetEntity=PageTranslation::class, mappedBy="page", orphanRemoval=true, cascade={"persist"})
     * @Assert\Valid()
     */
    protected Collection $translations;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function getTranslationForLocale(string $locale): ?PageTranslationInterface
    {
        foreach ($this->getTranslations() as $translation) {
            if ($translation->getLocale() === $locale) {
                return $translation;
            }
        }
        return null;
    }

    /**
     * @return Collection|PageTranslationInterface[]
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function setTranslations(Collection $translations): self
    {
        $this->translations = $translations;
        return $this;
    }

    public function addTranslation(PageTranslationInterface $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setPage($this);
        }

        return $this;
    }

    public function removeTranslation(PageTranslationInterface $translation): self
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getPage() === $this) {
                $translation->setPage(null);
            }
        }

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->getCurrentTranslation()->getLocale();
    }

    public function getSlug(): ?string
    {
        return $this->getCurrentTranslation()->getSlug();
    }

    public function setSlug(string $slug): self
    {
        $this->getCurrentTranslation()->setSlug($slug);

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->getCurrentTranslation()->getTitle();
    }

    public function setTitle(string $title): self
    {
        $this->getCurrentTranslation()->setTitle($title);

        return $this;
    }

    public function getHtmlTitle(): ?string
    {
        return $this->getCurrentTranslation()->getHtmlTitle();
    }

    public function setHtmlTitle(string $htmlTitle): self
    {
        $this->getCurrentTranslation()->setHtmlTitle($htmlTitle);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->getCurrentTranslation()->getDescription();
    }

    public function setDescription(?string $description): self
    {
        $this->getCurrentTranslation()->setDescription($description);

        return $this;
    }

    public function getHtmlDescription(): ?string
    {
        return $this->getCurrentTranslation()->getHtmlDescription();
    }

    public function setHtmlDescription(?string $htmlDescription): self
    {
        $this->getCurrentTranslation()->setHtmlDescription($htmlDescription);

        return $this;
    }

    public function getContent(): ?string
    {
        return ($this->getCurrentTranslation()) ?? '';
    }

    public function setContent(?string $content): self
    {
        $this->getCurrentTranslation()->setContent($content);

        return $this;
    }

    private function getCurrentTranslation(): ?PageTranslationInterface
    {
        if ($this->getTranslations()->count() === 1) {
            return $this->getTranslations()->first();
        }
        if ($this->getTranslations()->count() === 0) {
            return null;
        }
        dd(__FILE__ . ' - regel: ' . __LINE__, $this->getLocale());
        dd(__FILE__ . ' - regel: ' . __LINE__, $this->getTranslations()->count());
        throw new \UnexpectedValueException('No or multiple translations found');
    }
}