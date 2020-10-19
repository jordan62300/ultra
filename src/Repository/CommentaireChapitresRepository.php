<?php

namespace App\Repository;

use App\Entity\CommentaireChapitres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommentaireChapitres|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentaireChapitres|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentaireChapitres[]    findAll()
 * @method CommentaireChapitres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentaireChapitresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentaireChapitres::class);
    }


    /**
     * 
     */
    public function countItems() {
    $qb = $this->createQueryBuilder('t');
    return $qb
        ->select('count(t.id)')
        ->getQuery()
        ->getSingleScalarResult();
}


     /**
      * @return CommentaireChapitres[] Returns an array of CommentaireChapitres objects
      */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    

    
    public function findOneBySomeField($value): ?CommentaireChapitres
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
