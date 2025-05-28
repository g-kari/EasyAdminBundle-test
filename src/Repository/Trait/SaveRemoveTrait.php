<?php

namespace App\Repository\Trait;

/**
 * Provides common save and remove methods for repository classes.
 *
 * @template T of object
 */
trait SaveRemoveTrait
{
    /**
     * Save an entity to the database.
     *
     * @param T $entity The entity to save
     * @param bool $flush Whether to flush changes immediately
     */
    public function save(object $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Remove an entity from the database.
     *
     * @param object $entity The entity to remove
     * @param bool $flush Whether to flush changes immediately
     */
    public function remove(object $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}