<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 20/02/18
 * Time: 16:35
 */

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class ProviderRepository extends EntityRepository
{
    public function findAllSortedByNameQB()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.name', 'ASC')
            ;
    }
    public function findAllSortedByNameQ()
    {
        return $this->findAllSortedByNameQB()->getQuery();
    }
    public function findAllSortedByName()
    {
        return $this->findAllSortedByNameQ()->getResult();
    }
}