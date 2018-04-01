<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class OrderRepository.
 */
class OrderRepository extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findAllSortedByNameQB()
    {
        return $this
            ->createQueryBuilder('o')
            ->orderBy('o.date', 'ASC');
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function findAllSortedByNameQ()
    {
        return $this->findAllSortedByNameQB()->getQuery();
    }

    /**
     * @return array
     */
    public function findAllSortedByName()
    {
        return $this->findAllSortedByNameQ()->getResult();
    }
}
