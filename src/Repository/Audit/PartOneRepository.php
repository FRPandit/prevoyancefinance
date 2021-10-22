<?php

namespace App\Repository\Audit;

use App\Entity\Audit\PartOne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartOne|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartOne|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartOne[]    findAll()
 * @method PartOne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartOneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartOne::class);
    }

    // /**
    //  * @return PartOne[] Returns an array of PartOne objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PartOne
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
