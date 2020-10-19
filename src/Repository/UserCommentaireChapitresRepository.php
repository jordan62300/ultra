<?php

namespace App\Repository;

use App\Entity\UserCommentaireChapitres;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserCommentaireChapitres|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserCommentaireChapitres|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserCommentaireChapitres[]    findAll()
 * @method UserCommentaireChapitres[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserCommentaireChapitresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserCommentaireChapitres::class);
    }

    // /**
    //  * @return UserCommentaireChapitres[] Returns an array of UserCommentaireChapitres objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserCommentaireChapitres
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
