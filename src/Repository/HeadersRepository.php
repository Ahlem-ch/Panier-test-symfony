<?php

namespace App\Repository;

use App\Entity\Headers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Headers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Headers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Headers[]    findAll()
 * @method Headers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HeadersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Headers::class);
    }

   
}
