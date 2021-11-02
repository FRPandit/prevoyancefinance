<?php

namespace App\Repository\Audit\PartThree;

use App\Entity\Audit\PartThree\PatrimonyLabel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PatrimonyLabel|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatrimonyLabel|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatrimonyLabel[]    findAll()
 * @method PatrimonyLabel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatrimonyLabelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatrimonyLabel::class);
    }

    // /**
    //  * @return PatrimonyLabel[] Returns an array of PatrimonyLabel objects
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
    public function findOneBySomeField($value): ?PatrimonyLabel
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
