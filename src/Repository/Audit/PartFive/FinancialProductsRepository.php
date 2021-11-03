<?php

namespace App\Repository\Audit\PartFive;

use App\Entity\Audit\PartFive\FinancialProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FinancialProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method FinancialProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method FinancialProducts[]    findAll()
 * @method FinancialProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinancialProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FinancialProducts::class);
    }

    // /**
    //  * @return FinancialProducts[] Returns an array of FinancialProducts objects
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
    public function findOneBySomeField($value): ?FinancialProducts
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
