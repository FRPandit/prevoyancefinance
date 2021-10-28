<?php

namespace App\Repository\Audit;

use App\Entity\Audit\GuaranteeLabel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GuaranteeLabel|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuaranteeLabel|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuaranteeLabel[]    findAll()
 * @method GuaranteeLabel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuaranteeLabelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GuaranteeLabel::class);
    }

    // /**
    //  * @return GuaranteeLabel[] Returns an array of GuaranteeLabel objects
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
    public function findOneBySomeField($value): ?GuaranteeLabel
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
