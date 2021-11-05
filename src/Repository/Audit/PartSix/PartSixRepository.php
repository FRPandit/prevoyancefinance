<?php

namespace App\Repository\Audit\PartSix;

use App\Entity\Audit\PartSix\PartSix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartSix|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartSix|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartSix[]    findAll()
 * @method PartSix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartSixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartSix::class);
    }

    // /**
    //  * @return PartSix[] Returns an array of PartSix objects
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
    public function findOneBySomeField($value): ?PartSix
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
