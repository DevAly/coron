<?php

namespace App\Repository;

use App\Entity\Scholar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Scholar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scholar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scholar[]    findAll()
 * @method Scholar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScholarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Scholar::class);
    }

     /**
      * @return Scholar[] Returns an array of Scholar objects
      */

    public function findByslug($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.slug = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Scholar
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
