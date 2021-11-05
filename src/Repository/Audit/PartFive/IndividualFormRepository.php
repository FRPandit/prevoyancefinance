<?php

namespace App\Repository\Audit\PartFive;

use App\Entity\Audit\PartFive\IndividualForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IndividualForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method IndividualForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method IndividualForm[]    findAll()
 * @method IndividualForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndividualFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IndividualForm::class);
    }

    // /**
    //  * @return IndividualForm[] Returns an array of IndividualForm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IndividualForm
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
