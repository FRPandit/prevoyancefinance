<?php

namespace App\Repository\Audit;

use App\Entity\Audit\Audit;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Audit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Audit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Audit[]    findAll()
 * @method Audit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuditRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Audit::class);
    }

    /**
     * @return Audit[] Returns an array of Audits objects
    */
    public function lastTenAudits(){
        $qb = $this->createQueryBuilder('a');
        $qb->orderBy('a.id','DESC')
            ->setMaxResults(10);
        return $qb->getQuery()->getResult();
    }

    /**
     * @return Audit[] Returns an array of Audits objects
     */
    public function findByFilter($user, $date, $progress){
        $qb = $this->createQueryBuilder('a');
        //name SQL : SELECT * FROM audit INNER JOIN user ON audit.user_id = user.id WHERE user.name LIKE "%t%"
        if ($user){
            $qb->select('a')
                ->innerJoin("a.user", "u", Join::WITH,'a.user = u.id' )
                ->andWhere('u.name LIKE :user')
                ->setParameter('user', '%'.$user.'%');
        }
        // Date de création
        if($date){
            $qb->andWhere('a.creationDate <= :date')
                ->setParameter('date', $date);
        }
        if($progress){
            if($progress == "All"){
                $qb->andWhere('a.progress > :progress')
                    ->setParameter('progress', 0 );
            }
            elseif($progress == "inProgress"){
                $qb->andWhere('a.progress < :progress')
                ->setParameter('progress', 7 );
            }else{
                $qb->andWhere('a.progress = :progress')
                    ->setParameter('progress', 7);
            }

        }
        return $qb->getQuery()->getResult();
    }


    // /**
    //  * @return Audit[] Returns an array of Audit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Audit
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
