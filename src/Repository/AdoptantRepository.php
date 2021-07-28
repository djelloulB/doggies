<?php

namespace App\Repository;

use App\Entity\Adoptant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Adoptant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Adoptant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Adoptant[]    findAll()
 * @method Adoptant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdoptantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Adoptant::class);
    }

    // /**
    //  * @return Adoptant[] Returns an array of Adoptant objects
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
    public function findOneBySomeField($value): ?Adoptant
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
