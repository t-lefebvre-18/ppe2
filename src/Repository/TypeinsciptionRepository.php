<?php

namespace App\Repository;

use App\Entity\Typeinsciption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Typeinsciption|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typeinsciption|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typeinsciption[]    findAll()
 * @method Typeinsciption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeinsciptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Typeinsciption::class);
    }

    // /**
    //  * @return Typeinsciption[] Returns an array of Typeinsciption objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typeinsciption
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
