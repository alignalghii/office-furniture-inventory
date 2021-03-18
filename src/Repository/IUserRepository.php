<?php

namespace App\Repository;

use App\Entity\IUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method IUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method IUser[]    findAll()
 * @method IUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IUser::class);
    }

    // /**
    //  * @return IUser[] Returns an array of IUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IUser
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
