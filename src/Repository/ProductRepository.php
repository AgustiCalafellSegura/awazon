<?php

namespace App\Repository;

use App\Entity\Category;
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

    /**
     * @param Category $category
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findProductsByCategoryQB(Category $category)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.category = :category')
            ->setParameter('category', $category)
            ->orderBy('p.name', 'ASC')
            ->addOrderBy('p.createdAt', 'DESC')
        ;

        return $qb;
    }

    /**
     * @param Category $category
     *
     * @return \Doctrine\ORM\Query
     */
    public function findProductsByCategoryQ(Category $category)
    {
        return $this->findProductsByCategoryQB($category)->getQuery();
    }

    /**
     * @param Category $category
     *
     * @return array
     */
    public function findProductsByCategory(Category $category)
    {
        return $this->findProductsByCategoryQ($category)->getResult();
    }

    /**
     * @param Category $category
     * @param $name
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findProductsByCategoryAndNameQB(Category $category, $name)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.category = :category')
            ->andWhere('p.name LIKE :name')
            ->setParameter('name', '%'.$name.'%')
            ->setParameter('category', $category)
            ->orderBy('p.name', 'ASC')
            ->addOrderBy('p.createdAt', 'DESC')
        ;

        return $qb;
    }

    /**
     * @param Category $category
     * @param string   $name
     *
     * @return \Doctrine\ORM\Query
     */
    public function findProductsByCategoryAndNameQ(Category $category, $name)
    {
        return $this->findProductsByCategoryAndNameQB($category, $name)->getQuery();
    }

    /**
     * @param Category $category
     * @param string   $name
     *
     * @return array
     */
    public function findProductsByCategoryAndName(Category $category, $name)
    {
        return $this->findProductsByCategoryAndNameQ($category, $name)->getResult();
    }
}
