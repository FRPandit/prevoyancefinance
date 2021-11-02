<?php

namespace App\Repository;

use App\Entity\CreditLeasing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CreditLeasing|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreditLeasing|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreditLeasing[]    findAll()
 * @method CreditLeasing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreditLeasingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreditLeasing::class);
    }

    // /**
    //  * @return CreditLeasing[] Returns an array of CreditLeasing objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CreditLeasing
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
