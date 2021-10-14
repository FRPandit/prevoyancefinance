<?php

namespace App\Repository;

use App\Entity\Article;
use Container3wMPb0m\getThematicRepositoryService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @return Article[] Returns an array of Article objects
     */
    public function lastTenArticle(){
        $qb = $this->createQueryBuilder('a');
        $qb->orderBy('a.id', 'DESC')
            ->setMaxResults(10);

        return $qb->getQuery()->getResult();
    }

    /**
     * @return Article[]
     */
    public function lastFiveOffers($actuallyDate){
        $qb = $this->createQueryBuilder('a');
        $qb ->andwhere('a.category = :offre' )
            ->setParameter('offre', 2)
            ->andWhere('a.state = :state')
            ->setParameter("state", 2 )
            ->andWhere("a.expDate >= :actuallyDate")
            ->setParameter("actuallyDate",$actuallyDate)
            ->orderBy("a.id", 'DESC')
            ->setMaxResults(5);
        return $qb->getQuery()->getResult();
    }

    public function lastActu(){
        $qb = $this->createQueryBuilder('a');
        $qb->andWhere('a.category = :actu')
            ->setParameter('actu', 1)
            ->andWhere('a.state = :state')
            ->setParameter("state", 2)
            ->orderBy("a.id","DESC");

        return $qb->getQuery()->getResult();
    }

    /**
     * @return Article[] Returns an array of Article objects
     */
    public function findByFilter($nameArticle, $nameCategory, $free, $sub, $date1, $date2,
                                 $mutualHealth, $foresight, $saving, $retirement, $tax,
                                 $succession, $others, $created, $published, $archived)
    {

        $qb = $this->createQueryBuilder('a');
        //NAME
        if ($nameArticle) {
            $qb->andWhere('a.ArtName LIKE :Artname')
                ->setParameter('Artname', '%' . $nameArticle . '%');
        }
        // CATEGORIES
        if ($nameCategory) {
            $qb->andWhere('a.category = :category')
                ->setParameter('category', $nameCategory);
        }


        // ACCESS
        if ($free || $sub) {
            $qb
                ->andwhere('a.access IN (:access)')
                ->setParameter('access', [$free, $sub]);
        }

        //THEMATICS
        if ($mutualHealth || $foresight || $saving || $retirement || $tax || $succession || $others) {
            $qb
                ->andwhere('a.thematic IN (:thematic)')
                ->setParameter('thematic', [$mutualHealth, $foresight, $saving, $retirement, $tax, $succession, $others]);
        }

        //STATE

        if ($created || $published || $archived) {
            $qb
                ->andwhere('a.state IN (:state)')
                ->setParameter('state', [$created, $published, $archived]);
        }

        //DATE
        if ($date1) {
            $qb->andWhere('a.creationDate >= :date1')
                ->setParameter('date1', $date1);
        }
        if ($date2) {
            $qb->andWhere('a.creationDate <= :date2')
                ->setParameter('date2', $date2);
        }

        return $qb->getQuery()->getResult();
    }


    /**
     * @return Article[]
     */
    public function mostRead(){
        $qb = $this->createQueryBuilder('a');
        $qb ->andwhere('a.category = :actu' )
            ->setParameter('actu', 1)
            ->andWhere('a.state = :state')
            ->setParameter("state", 2 )
            ->orderBy("a.nbOfView", 'DESC')
            ->setMaxResults(8);
        return $qb->getQuery()->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Article
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
