<?php

namespace App\Repository;

use App\Entity\TUserSetting;
use App\Repository\Trait\SaveRemoveTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TUserSetting>
 */
class TUserSettingRepository extends ServiceEntityRepository
{
    use SaveRemoveTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TUserSetting::class);
    }
}