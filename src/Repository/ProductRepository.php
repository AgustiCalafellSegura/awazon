<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 16:35
 */

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

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
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function findTopTenMostRatedProductsQB()
    {
        $qb = $this->createQueryBuilder('p')
            ->join('p.ratings', 'r')
            ->where('r.rate = 5')
        ;

        return $qb;
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function findTopTenMostRatedProductsQ()
    {
        return $this->findTopTenMostRatedProductsQB()->getQuery();
    }

    /**
     * @return array
     */
    public function findTopTenMostRatedProducts()
    {
        return $this->findTopTenMostRatedProductsQ()->getResult();
    }
}