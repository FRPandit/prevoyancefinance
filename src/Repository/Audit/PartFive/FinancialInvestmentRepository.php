<?php

namespace App\Repository\Audit\PartFive;

use App\Entity\Audit\PartFive\FinancialInvestment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FinancialInvestment|null find($id, $lockMode = null, $lockVersion = null)
 * @method FinancialInvestment|null findOneBy(array $criteria, array $orderBy = null)
 * @method FinancialInvestment[]    findAll()
 * @method FinancialInvestment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinancialInvestmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FinancialInvestment::class);
    }

    // /**
    //  * @return FinancialInvestment[] Returns an array of FinancialInvestment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FinancialInvestment
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
