<?php

namespace App\Repository\Exploc;

use App\Entity\Exploc\Dossiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dossiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dossiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dossiere[]    findAll()
 * @method Dossiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DossiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dossiere::class);
    }

    // /**
    //  * @return Dossiere[] Returns an array of Dossiere objects
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
    public function findOneBySomeField($value): ?Dossiere
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
