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
     * @return Article[] Returns an array of Sortie objects
     */
    public function findByFilter($nameArticle, $category, $free, $sub, $date1, $date2,
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
        if ($category) {
            $qb->andWhere('a.category = :category')
                ->setParameter('category', $category);
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
