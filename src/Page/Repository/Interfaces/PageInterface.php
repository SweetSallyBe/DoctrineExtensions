<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Repository\Interfaces;

use SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces\PageInterface as PageEntityInterface;

/**
 * @method PageEntityInterface|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageEntityInterface|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageEntityInterface[]    findAll()
 * @method PageEntityInterface[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
interface PageInterface
{
    public function getPageByLocaleAndSlug(string $locale, string $slug): ?PageEntityInterface;
}
