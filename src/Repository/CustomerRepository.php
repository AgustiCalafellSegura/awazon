<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class CustomerRepository.
 */
class CustomerRepository extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findAllSortedByNameQB()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.name', 'ASC')
            ;
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

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findBestCustomersQB()
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c, COUNT(c.id) as amount')
            ->join('c.orders', 'o')
            ->groupBy('o.customer')
            ->setMaxResults(10)
            ->orderBy('amount', 'DESC')
            ->addOrderBy('c.name', 'ASC')
        ;

        return $qb;
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function findBestsCustomersQ()
    {
        return $this->findBestCustomersQB()->getQuery();
    }

    /**
     * @return array
     */
    public function findBestCustomers()
    {
        return $this->findBestsCustomersQ()->getResult();
    }
}
