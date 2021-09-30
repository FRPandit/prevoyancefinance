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

    /**
     * @return Article[] Returns an array of Sortie objects
     */
    public function findByFilter($nameArticle, $category,$accessFilter, $date1, $date2, $mutuelle, $prevoyance, $epargne, $retraite,
    $impot, $succession, $autres)
    {
        $qb = $this->createQueryBuilder('a');
        if ($nameArticle) {
            $qb->andWhere('a.ArtName LIKE :Artname')
                ->setParameter('Artname', '%' . $nameArticle . '%');
        }
        if ($category) {
            $qb->andWhere('a.category = :category')
                ->setParameter('category', $category);
        }
        if ($accessFilter) {
            $qb->andWhere('a.access = :access')
                ->setParameter('access', $accessFilter);
        }
       if ($mutuelle && $prevoyance && $epargne ) {
           //SELECT * FROM article WHERE thematic_id IN (1,2,3)
            $qb->expr()->in('a.thematic',array($mutuelle,$prevoyance,$epargne));


        }
       /* if ($prevoyance) {
            $qb->andWhere('a.thematic = :prevoyance')
                ->setParameter('prevoyance', $prevoyance);
        }
        if ($epargne) {
            $qb->andWhere('a.thematic = :epargne')
                ->setParameter('epargne', $epargne);
        }*/
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

        if($date1){
            $qb->andWhere('a.creationDate >= :date1')
                ->setParameter('date1', $date1);
        }
        if($date2){
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
