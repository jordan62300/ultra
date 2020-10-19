<?php

namespace App\Repository;

use App\Entity\Arcs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Arcs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Arcs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Arcs[]    findAll()
 * @method Arcs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArcsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Arcs::class);
    }

    // /**
    //  * @return Arcs[] Returns an array of Arcs objects
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
    public function findOneBySomeField($value): ?Arcs
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
