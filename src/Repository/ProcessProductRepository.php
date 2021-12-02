<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\ProcessProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProcessProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProcessProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProcessProduct[]    findAll()
 * @method ProcessProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProcessProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProcessProduct::class);
    }
}
