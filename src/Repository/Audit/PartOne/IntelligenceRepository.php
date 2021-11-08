<?php

namespace App\Repository\Audit\PartOne;

use App\Entity\Audit\PartOne\Intelligence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Intelligence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Intelligence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Intelligence[]    findAll()
 * @method Intelligence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntelligenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Intelligence::class);
    }

    // /**
    //  * @return Intelligence[] Returns an array of Intelligence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Intelligence
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
