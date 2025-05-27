<?php

namespace App\Repository\Trait;

use Doctrine\Persistence\ObjectRepository;

/**
 * Common repository methods for entity persistence operations
 */
trait EntityManagerTrait
{
    /**
     * Save an entity to the database
     * 
     * @param object $entity The entity to save
     * @param bool $flush Whether to flush changes immediately
     * @return void
     */
    public function save(object $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Remove an entity from the database
     * 
     * @param object $entity The entity to remove
     * @param bool $flush Whether to flush changes immediately
     * @return void
     */
    public function remove(object $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}