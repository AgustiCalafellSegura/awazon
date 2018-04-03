<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class ProductRepository.
 */
class ProductRepository extends EntityRepository
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
     * @param int $rate
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findTopTenMostRatedProductsQB($rate = 5)
    {
        $qb = $this->createQueryBuilder('p')
            ->join('p.ratings', 'r')
            ->where('r.rate = :rate')
            ->setParameter('rate', $rate)
            ->setMaxResults(10)
            ->orderBy('p.name', 'ASC')
            ->addOrderBy('p.createdAt', 'DESC')
        ;

        return $qb;
    }

    /**
     * @param int $rate
     *
     * @return \Doctrine\ORM\Query
     */
    public function findTopTenMostRatedProductsQ($rate = 5)
    {
        return $this->findTopTenMostRatedProductsQB($rate)->getQuery();
    }

    /**
     * @param int $rate
     *
     * @return array
     */
    public function findTopTenMostRatedProducts($rate = 5)
    {
        return $this->findTopTenMostRatedProductsQ($rate)->getResult();
    }
}
