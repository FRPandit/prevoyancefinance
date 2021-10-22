<?php

namespace App\Repository\Audit;

use App\Entity\Audit\ShareInCompagny;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShareInCompagny|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShareInCompagny|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShareInCompagny[]    findAll()
 * @method ShareInCompagny[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShareInCompagnyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShareInCompagny::class);
    }

    // /**
    //  * @return ShareInCompagny[] Returns an array of ShareInCompagny objects
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
    public function findOneBySomeField($value): ?ShareInCompagny
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
