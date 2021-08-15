<?php

namespace App\Repository;

use App\Entity\Adoptant;
use App\Entity\Annonce;
use App\Entity\DemandeAdoption;
use App\Entity\Message;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DemandeAdoption|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeAdoption|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeAdoption[]    findAll()
 * @method DemandeAdoption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeAdoptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeAdoption::class);
    }

    // /**
    //  * @return DemandeAdoption[] Returns an array of DemandeAdoption objects
    //  */
    public function findByAdoptant(Annonce $annonce,Adoptant $adoptant)
    {
        return $this->createQueryBuilder('demande')
            ->join('demande.annonce', 'an')
            ->andWhere('an.id = :annonce')
            // On donne une valeur au paramètre. Contrairement à PDO, il n'est pas obligatoire de donner une variable ici, vous pourriez mettre une valeur directement.
            ->setParameter('annonce', $annonce->getId())
            ->join('demande.adoptants', 'a')
            ->andWhere('a.id = :adoptant')
            ->setParameter('adoptant', $adoptant->getId())
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
     // /**
    //  * @return DemandeAdoption[] Returns an array of DemandeAdoption objects
    //  */
    public function findByMessages( Adoptant $adoptant)
    {
        return $this->createQueryBuilder('dem')
            ->join('dem.messages', 'mess')
            ->andWhere('dem.id = :demande')
            // On donne une valeur au paramètre. Contrairement à PDO, il n'est pas obligatoire de donner une variable ici, vous pourriez mettre une valeur directement.
            //->setParameter('demande', $demandeAdoption->getId())
            ->join('demande.adoptants', 'a')
            ->andWhere('a.id = :adoptant')
            ->setParameter('adoptant', $adoptant->getId())
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
    public function findMessageByAdoptant(Adoptant $addoptant): ?DemandeAdoption
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            //->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    public function findDemandesByAnnonceAndAdoptant( $id){
        return $this->createQueryBuilder('d')
            ->join('d.adoptants', 'adoptant')
            ->join('d.messages','messages' )
            ->andWhere('adoptant.id = :idAdoptant')
            ->setParameter('idAdoptant', $id)
            ->getQuery()
            ->getResult();
    }
    /*
    public function findOneBySomeField($value): ?DemandeAdoption
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
