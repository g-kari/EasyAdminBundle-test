<?php

namespace App\Repository;

use App\Entity\MUserRole;
use App\Repository\Trait\EntityManagerTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MUserRole>
 */
class MUserRoleRepository extends ServiceEntityRepository
{
    use EntityManagerTrait;
    
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MUserRole::class);
    }
}