<?php

namespace App\Repository;

use App\Entity\DamandeAdoption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DamandeAdoption|null find($id, $lockMode = null, $lockVersion = null)
 * @method DamandeAdoption|null findOneBy(array $criteria, array $orderBy = null)
 * @method DamandeAdoption[]    findAll()
 * @method DamandeAdoption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DamandeAdoptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DamandeAdoption::class);
    }

    // /**
    //  * @return DamandeAdoption[] Returns an array of DamandeAdoption objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DamandeAdoption
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
