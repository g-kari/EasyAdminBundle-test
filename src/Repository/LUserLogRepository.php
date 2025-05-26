<?php

namespace App\Repository;

use App\Entity\LUserLog;
use App\Repository\Trait\SaveAndRemoveTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LUserLog>
 */
class LUserLogRepository extends ServiceEntityRepository
{
    use SaveAndRemoveTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LUserLog::class);
    }
}
