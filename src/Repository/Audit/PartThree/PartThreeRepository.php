<?php

namespace App\Repository\Audit\PartThree;

use App\Entity\Audit\PartThree\PartThree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartThree|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartThree|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartThree[]    findAll()
 * @method PartThree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartThreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartThree::class);
    }

    // /**
    //  * @return PartThree[] Returns an array of PartThree objects
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
    public function findOneBySomeField($value): ?PartThree
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
