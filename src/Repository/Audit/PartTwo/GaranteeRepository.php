<?php

namespace App\Repository\Audit\PartTwo;

use App\Entity\Audit\PartTwo\Guarantee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Guarantee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guarantee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guarantee[]    findAll()
 * @method Guarantee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GaranteeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Guarantee::class);
    }

    // /**
    //  * @return Guarantee[] Returns an array of Guarantee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Guarantee
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
