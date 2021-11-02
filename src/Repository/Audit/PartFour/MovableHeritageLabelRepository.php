<?php

namespace App\Repository\Audit\PartFour;

use App\Entity\Audit\PartFour\MovableHeritageLabel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MovableHeritageLabel|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovableHeritageLabel|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovableHeritageLabel[]    findAll()
 * @method MovableHeritageLabel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovableHeritageLabelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovableHeritageLabel::class);
    }

    // /**
    //  * @return MovableHeritageLabel[] Returns an array of MovableHeritageLabel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MovableHeritageLabel
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
