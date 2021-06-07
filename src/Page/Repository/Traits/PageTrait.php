<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Repository\Traits;

use SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces\PageInterface;
use SweetSallyBe\DoctrineExtensions\Page\Repository\Interfaces\PageTranslationInterface;

/**
 * @method PageInterface|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageInterface|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageInterface[]    findAll()
 * @method PageInterface[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
trait PageTrait
{
    private PageTranslationInterface $translationRepository;

    public function getPageByLocaleAndSlug(string $locale, string $slug): ?PageInterface
    {
        return $this->createQueryBuilder('page')
            ->leftJoin('page.translations', 'translations')
            ->where('translations.locale = :locale')
            ->andWhere('translations.slug = :slug')
            ->setParameters(['locale' => $locale, 'slug' => $slug])
            ->getQuery()
            ->getOneOrNullResult();
    }
}
