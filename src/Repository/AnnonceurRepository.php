<?php

namespace App\Repository;

use App\Entity\Annonceur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Annonceur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonceur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonceur[]    findAll()
 * @method Annonceur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonceur::class);
    }

    /**
     * @return Annonceur[] Returns an array of Annonceur objects
     */
    public function findByDateMAJ()  //methode pour faire une requete de type sql
    {
        return $this->createQueryBuilder('annonceur') //'annonceur' = alias de la table annonceur
            ->leftJoin('annonceur.annonces', 'annonce') //jointure de la table annonceur aux annonce, 2eme param = alias, leftJoin pour choper tous les annonceurs, même ceux qui n'ont pas d'annonces
            ->orderBy('annonce.dateMAJ', 'DESC') //ordonné par la date de maj des annonces, en ordre deccroissant
            ->getQuery() // On récupère la requête générée
            ->getResult() // On exécute la requête et on récupère les résultats. On les retourne sous la forme d'un tableau (qui contient des objets Annonceur)
        ;
    }

    /*
    public function findOneBySomeField($value): ?Annonceur
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
