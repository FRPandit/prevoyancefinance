<?php

namespace App\Repository\Audit;

use App\Entity\Audit\FutureIncome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FutureIncome|null find($id, $lockMode = null, $lockVersion = null)
 * @method FutureIncome|null findOneBy(array $criteria, array $orderBy = null)
 * @method FutureIncome[]    findAll()
 * @method FutureIncome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FutureIncomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FutureIncome::class);
    }

    // /**
    //  * @return FutureIncome[] Returns an array of FutureIncome objects
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
    public function findOneBySomeField($value): ?FutureIncome
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
