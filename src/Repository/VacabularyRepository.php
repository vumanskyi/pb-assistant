<?php

namespace App\Repository;

use App\Entity\Vacabulary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Vacabulary|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vacabulary|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vacabulary[]    findAll()
 * @method Vacabulary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VacabularyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vacabulary::class);
    }

    // /**
    //  * @return Vacabulary[] Returns an array of Vacabulary objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vacabulary
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
