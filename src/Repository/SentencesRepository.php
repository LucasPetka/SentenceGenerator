<?php

namespace App\Repository;

use App\Entity\Sentences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sentences|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sentences|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sentences[]    findAll()
 * @method Sentences[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SentencesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sentences::class);
    }

    // /**
    //  * @return Sentences[] Returns an array of Sentences objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sentences
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
