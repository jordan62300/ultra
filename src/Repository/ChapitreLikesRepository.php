<?php

namespace App\Repository;

use App\Entity\ChapitreLikes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChapitreLikes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChapitreLikes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChapitreLikes[]    findAll()
 * @method ChapitreLikes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChapitreLikesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChapitreLikes::class);
    }

    // /**
    //  * @return ChapitreLikes[] Returns an array of ChapitreLikes objects
    //  */
    /*
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
    */

    /*
    public function findOneBySomeField($value): ?ChapitreLikes
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
