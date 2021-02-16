<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    public function findByCategorie($value) {
        return $this->createQueryBuilder('p')
        ->select('p')
        ->innerJoin('p.categorie', 'c')
        ->where('c.id = p.categorie')
        ->andWhere('c.nom = :categorie')
        ->setParameter('categorie', $value)
        ->setMaxResults(3)
        ->getQuery()
        ->getResult();
    }

    public function findByCategorieById($value) {
        return $this->createQueryBuilder('p')
        ->select('p')
        ->innerJoin('p.categorie', 'c')
        ->where('c.id = p.categorie')
        ->andWhere('c.id = :idCategorie')
        ->setParameter('idCategorie', $value)
        ->setMaxResults(3)
        ->getQuery()
        ->getResult();
    }

    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
