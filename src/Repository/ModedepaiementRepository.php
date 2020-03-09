<?php

namespace App\Repository;

use App\Entity\Modedepaiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Modedepaiement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Modedepaiement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Modedepaiement[]    findAll()
 * @method Modedepaiement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModedepaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Modedepaiement::class);
    }

    // /**
    //  * @return Modedepaiement[] Returns an array of Modedepaiement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Modedepaiement
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
