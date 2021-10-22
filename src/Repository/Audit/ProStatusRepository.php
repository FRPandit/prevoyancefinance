<?php

namespace App\Repository\Audit;

use App\Entity\Audit\ProStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProStatus[]    findAll()
 * @method ProStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProStatus::class);
    }

    // /**
    //  * @return ProStatus[] Returns an array of ProStatus objects
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
    public function findOneBySomeField($value): ?ProStatus
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
