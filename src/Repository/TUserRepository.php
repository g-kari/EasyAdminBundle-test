<?php

namespace App\Repository;

use App\Entity\TUser;
use App\Repository\Trait\SaveRemoveTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TUser>
 */
class TUserRepository extends ServiceEntityRepository
{
    use SaveRemoveTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TUser::class);
    }
}