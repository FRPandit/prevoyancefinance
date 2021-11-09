<?php

namespace App\Repository\Audit\PartTwo;

use App\Entity\Audit\PartTwo\SavingsPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SavingsPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method SavingsPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method SavingsPlan[]    findAll()
 * @method SavingsPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SavingsPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SavingsPlan::class);
    }

    // /**
    //  * @return SavingsPlan[] Returns an array of SavingsPlan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SavingsPlan
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
