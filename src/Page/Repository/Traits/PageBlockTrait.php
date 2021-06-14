<?php

namespace App\Repository;

use App\Entity\PageBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces\PageBlockInterface as PageBlockEntityInterface;
use SweetSallyBe\DoctrineExtensions\Page\Repository\Interfaces\PageBlockInterface;

/**
 * @method PageBlockEntityInterface|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageBlockEntityInterface|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageBlockEntityInterface[]    findAll()
 * @method PageBlockEntityInterface[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
trait PageBlockTrait
{
}
