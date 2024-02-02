<?php

namespace App\Repository;

use App\Entity\Bateau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bateau>
 *
 * @method Bateau|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bateau|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bateau[]    findAll()
 * @method Bateau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BateauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bateau::class);
    }

//    /**
//     * @return Bateau[] Returns an array of Bateau objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bateau
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
