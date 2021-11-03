<?php

namespace App\Repository\Audit\PartFive;

use App\Entity\Audit\PartFive\ShareOfInvestment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShareOfInvestment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShareOfInvestment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShareOfInvestment[]    findAll()
 * @method ShareOfInvestment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShareOfInvestmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShareOfInvestment::class);
    }

    // /**
    //  * @return ShareOfInvestment[] Returns an array of ShareOfInvestment objects
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
    public function findOneBySomeField($value): ?ShareOfInvestment
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
