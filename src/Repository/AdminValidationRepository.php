<?php

namespace App\Repository;

use App\Entity\AdminValidation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdminValidation|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdminValidation|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdminValidation[]    findAll()
 * @method AdminValidation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdminValidationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdminValidation::class);
    }

    // /**
    //  * @return AdminValidation[] Returns an array of AdminValidation objects
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
    public function findOneBySomeField($value): ?AdminValidation
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
