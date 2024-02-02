<?php

namespace App\Repository;

use App\Entity\ListeEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListeEvent>
 *
 * @method ListeEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeEvent[]    findAll()
 * @method ListeEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeEvent::class);
    }

//    /**
//     * @return ListeEvent[] Returns an array of ListeEvent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListeEvent
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
