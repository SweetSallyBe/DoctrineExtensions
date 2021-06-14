<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Repository\Interfaces;

use App\Entity\PageBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces\PageBlockInterface as PageBlockEntityInterface;

/**
 * @method PageBlockEntityInterface|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageBlockEntityInterface|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageBlockEntityInterface[]    findAll()
 * @method PageBlockEntityInterface[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
interface PageBlockInterface
{
}
