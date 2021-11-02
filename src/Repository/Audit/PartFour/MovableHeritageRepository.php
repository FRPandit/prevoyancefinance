<?php

namespace App\Repository\Audit\PartFour;

use App\Entity\Audit\PartFour\MovableHeritage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MovableHeritage|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovableHeritage|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovableHeritage[]    findAll()
 * @method MovableHeritage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovableHeritageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovableHeritage::class);
    }

    // /**
    //  * @return MovableHeritage[] Returns an array of MovableHeritage objects
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
    public function findOneBySomeField($value): ?MovableHeritage
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
