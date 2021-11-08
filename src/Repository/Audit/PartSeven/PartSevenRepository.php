<?php

namespace App\Repository\Audit\PartSeven;

use App\Entity\Audit\PartSeven\PartSeven;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartSeven|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartSeven|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartSeven[]    findAll()
 * @method PartSeven[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartSevenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartSeven::class);
    }

    // /**
    //  * @return PartSeven[] Returns an array of PartSeven objects
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
    public function findOneBySomeField($value): ?PartSeven
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
