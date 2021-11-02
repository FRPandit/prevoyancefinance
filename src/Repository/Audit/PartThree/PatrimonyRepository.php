<?php

namespace App\Repository\Audit\PartThree;

use App\Entity\Audit\PartThree\Patrimony;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Patrimony|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patrimony|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patrimony[]    findAll()
 * @method Patrimony[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatrimonyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patrimony::class);
    }

    // /**
    //  * @return Patrimony[] Returns an array of Patrimony objects
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
    public function findOneBySomeField($value): ?Patrimony
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
