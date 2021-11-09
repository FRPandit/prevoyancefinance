<?php

namespace App\Repository\Audit\PartOne;

use App\Entity\Audit\PartOne\Maried;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Maried|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maried|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maried[]    findAll()
 * @method Maried[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MariedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maried::class);
    }

    // /**
    //  * @return Maried[] Returns an array of Maried objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Maried
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
