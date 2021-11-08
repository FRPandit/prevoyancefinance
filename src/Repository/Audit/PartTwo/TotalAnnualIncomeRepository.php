<?php

namespace App\Repository\Audit\PartTwo;

use App\Entity\Audit\PartTwo\TotalAnnualIncome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TotalAnnualIncome|null find($id, $lockMode = null, $lockVersion = null)
 * @method TotalAnnualIncome|null findOneBy(array $criteria, array $orderBy = null)
 * @method TotalAnnualIncome[]    findAll()
 * @method TotalAnnualIncome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TotalAnnualIncomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TotalAnnualIncome::class);
    }

    // /**
    //  * @return TotalAnnualIncome[] Returns an array of TotalAnnualIncome objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TotalAnnualIncome
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
