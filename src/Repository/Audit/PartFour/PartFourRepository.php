<?php

namespace App\Repository\Audit\PartFour;

use App\Entity\Audit\PartFour\PartFour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartFour|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartFour|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartFour[]    findAll()
 * @method PartFour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartFourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartFour::class);
    }

    // /**
    //  * @return PartFour[] Returns an array of PartFour objects
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
    public function findOneBySomeField($value): ?PartFour
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
