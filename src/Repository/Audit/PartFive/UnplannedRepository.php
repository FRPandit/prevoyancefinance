<?php

namespace App\Repository\Audit\PartFive;

use App\Entity\Audit\PartFive\Unplanned;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Unplanned|null find($id, $lockMode = null, $lockVersion = null)
 * @method Unplanned|null findOneBy(array $criteria, array $orderBy = null)
 * @method Unplanned[]    findAll()
 * @method Unplanned[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnplannedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Unplanned::class);
    }

    // /**
    //  * @return Unplanned[] Returns an array of Unplanned objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Unplanned
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
