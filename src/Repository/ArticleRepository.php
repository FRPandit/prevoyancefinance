<?php

namespace App\Repository;

use App\Entity\Article;
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

    public function findByFilter($nameArticle, $category, $abonne,$libre,$lesDeux, $mutuelle,$prevoyance, $epargne, $retraite, $impot,
    $succession, $autres, $cree, $publie, $archive)
    {
        $qb = $this->createQueryBuilder('a');
        if ($nameArticle) {
            $qb->andWhere('a.name LIKE :name')
                ->setParameter('name', '%' . $nameArticle . '%');
        }
        if ($category) {
            $qb->andWhere('a.category = :category')
                ->setParameter('category', $category);
        }
        if ($abonne) {
            $qb->andWhere('a.access = :abonne')
                ->setParameter('abonne', $abonne);
        }
        if ($libre) {
            $qb->andWhere('a.access = :libre')
                ->setParameter('libre', $libre);
        }
        if ($lesDeux) {
          $qb->andWhere()('a.category = :lesDeux')
              ->setParameter("lesDeux", $lesDeux);
        }
        if ($mutuelle) {
            $qb->andWhere('a.thematic = :mutuelle')
                ->setParameter('mutuelle', $mutuelle);
        }
        if ($prevoyance) {
            $qb->andWhere('a.thematic = :prevoyance')
                ->setParameter('prevoyance', $prevoyance);
        }
        if ($epargne) {
            $qb->andWhere('a.thematic = :epargne')
                ->setParameter('epargne', $epargne);
        }
        if ($retraite) {
            $qb->andWhere('a.thematic = :retraite')
                ->setParameter('retraite', $retraite);
        }
        if ($impot) {
            $qb->andWhere('a.thematic = :impot ')
                ->setParameter('impot', $impot);
        }
        if ($succession) {
            $qb->andWhere('a.thematic = :succession')
                ->setParameter('succession', $succession);
        }
        if ($autres) {
            $qb->andWhere('a.thematic = :autres')
                ->setParameter('autres', $autres);
        }

        if ($cree) {
            $qb->andWhere('a.state = :cree ')
                ->setParameter('cree', $cree);
        }
        if ($publie) {
            $qb->andWhere('a.state = :publie ')
                ->setParameter('publie', $publie);
        }
        if ($archive){
            $qb->andWhere('a.state = :archive')
                ->setParameter('archive', $archive);
        }
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
