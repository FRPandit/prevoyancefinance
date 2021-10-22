<?php

namespace App\Repository\Audit;

use App\Entity\Audit\PartTwo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PartTwo|null find($id, $lockMode = null, $lockVersion = null)
 * @method PartTwo|null findOneBy(array $criteria, array $orderBy = null)
 * @method PartTwo[]    findAll()
 * @method PartTwo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartTwoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PartTwo::class);
    }

    // /**
    //  * @return PartTwo[] Returns an array of PartTwo objects
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
    public function findOneBySomeField($value): ?PartTwo
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
