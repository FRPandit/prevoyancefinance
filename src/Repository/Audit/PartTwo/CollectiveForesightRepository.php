<?php

namespace App\Repository\Audit\PartTwo;

use App\Entity\Audit\PartTwo\CollectiveForesight;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CollectiveForesight|null find($id, $lockMode = null, $lockVersion = null)
 * @method CollectiveForesight|null findOneBy(array $criteria, array $orderBy = null)
 * @method CollectiveForesight[]    findAll()
 * @method CollectiveForesight[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectiveForesightRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CollectiveForesight::class);
    }

    // /**
    //  * @return CollectiveForesight[] Returns an array of CollectiveForesight objects
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
    public function findOneBySomeField($value): ?CollectiveForesight
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
