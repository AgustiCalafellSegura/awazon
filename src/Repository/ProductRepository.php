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
            ->orderBy('p.name', 'DESC')
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
    public function findLastProductsAddedQB()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC')
            ->addOrderBy('p.name', 'ASC')
            ->addOrderBy('p.price', 'DESC')
            ->setMaxResults(4)
            ;
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function findLastProductsAddedQ()
    {
        return $this->findLastProductsAddedQB()->getQuery();
    }

    /**
     * @return array
     */
    public function findLastProductsAdded()
    {
        return $this->findLastProductsAddedQ()->getResult();
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findBestSellersProductsQB()
    {
        return $this->createQueryBuilder('p')
            ->select('p, COUNT(p.id) as amount')
            ->join('p.orderItems', 'r')
            ->groupBy('r.product')
            ->orderBy('amount', 'DESC')
            ->setMaxResults(4)
            ;
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function findBestSellersProductsQ()
    {
        return $this->findBestSellersProductsQB()->getQuery();
    }

    /**
     * @return array
     */
    public function findBestSellersProducts()
    {
        return $this->findBestSellersProductsQ()->getResult();
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
            ->setMaxResults(4)
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

    /**
     * @param string $name
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findByNameQB($name)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.name LIKE :name')
            ->setParameter('name', '%'.$name.'%')
            ->orderBy('p.name', 'ASC')
            ->addOrderBy('p.createdAt', 'DESC')
        ;

        return $qb;
    }

    /**
     * @param string $name
     *
     * @return \Doctrine\ORM\Query
     */
    public function findByNameQ($name)
    {
        return $this->findByNameQB($name)->getQuery();
    }

    /**
     * @param string $name
     *
     * @return array
     */
    public function findByName($name)
    {
        return $this->findByNameQ($name)->getResult();
    }
}
