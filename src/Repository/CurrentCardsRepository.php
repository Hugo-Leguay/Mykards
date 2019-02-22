<?php

namespace App\Repository;

use App\Entity\CurrentCards;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;




/**
 * @method CurrentCards|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrentCards|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrentCards[]    findAll()
 * @method CurrentCards[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrentCardsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CurrentCards::class);
    }

    // /**
    //  * @return CurrentCards[] Returns an array of CurrentCards objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CurrentCards
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
