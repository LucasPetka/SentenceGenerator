<?php

namespace App\Repository;

use App\Entity\LanguagePart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LanguagePart|null find($id, $lockMode = null, $lockVersion = null)
 * @method LanguagePart|null findOneBy(array $criteria, array $orderBy = null)
 * @method LanguagePart[]    findAll()
 * @method LanguagePart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LanguagePartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LanguagePart::class);
    }

    // /**
    //  * @return LanguagePart[] Returns an array of LanguagePart objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LanguagePart
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
