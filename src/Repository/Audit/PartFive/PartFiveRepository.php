<?php

namespace App\Repository\Audit\PartFive;

use App\Entity\Audit\PartFive\PartFive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartFive|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartFive|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartFive[]    findAll()
 * @method PartFive[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartFiveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartFive::class);
    }

    // /**
    //  * @return PartFive[] Returns an array of PartFive objects
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
    public function findOneBySomeField($value): ?PartFive
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
