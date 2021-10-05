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
    public function findByFilter($nameArticle, $category, $free, $sub,$date1, $date2,
                                 $mutualHealth, $foresight, $saving, $retirement, $tax,
                                 $succession, $others,$created,$published,$archived)
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

        if ($free) {
            $qb->orWhere('a.access = :free')
                ->setParameter('free', $free);
        }
        if ($sub) {
            $qb->orWhere('a.access = :sub')
                ->setParameter('sub', $sub);
        }

        if ($mutualHealth){
            $qb->orWhere('a.thematic = :mutualHealth')
                ->setParameter('mutualHealth', $mutualHealth);
        }

        if($foresight){
            $qb->orWhere('a.thematic = :foresight')
                ->setParameter('foresight', $foresight);
        }

        if($saving){
            $qb->orWhere('a.thematic = :saving')
                ->setParameter('saving', $saving);
        }

        if($retirement){
            $qb->orWhere('a.thematic = :retirement')
                ->setParameter('retirement', $retirement);
        }
        if ($tax) {
            $qb->orWhere('a.thematic = :tax ')
                ->setParameter('tax', $tax);
        }
        if ($succession) {
            $qb->orWhere('a.thematic = :succession')
                ->setParameter('succession', $succession);
        }
        if ($others) {
            $qb->orWhere('a.thematic = :others')
                ->setParameter('others', $others);
        }


        if ($created) {
            $qb->orWhere('a.state = :created')
                ->setParameter('created', $created);
        }

        if ($published) {
            $qb->orWhere('a.state = :published')
                ->setParameter('published', $published);
        }

        if ($archived) {
            $qb->orWhere('a.state = :archived')
                ->setParameter('archived', $archived);
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
