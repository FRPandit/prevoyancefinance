<?php

namespace App\Repository\Audit\PartSix;

use App\Entity\Audit\PartSix\FamilyNeeds;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FamilyNeeds|null find($id, $lockMode = null, $lockVersion = null)
 * @method FamilyNeeds|null findOneBy(array $criteria, array $orderBy = null)
 * @method FamilyNeeds[]    findAll()
 * @method FamilyNeeds[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilyNeedsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FamilyNeeds::class);
    }

    // /**
    //  * @return FamilyNeeds[] Returns an array of FamilyNeeds objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FamilyNeeds
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
