<?php

namespace AppBundle\EntityManager;

class ShoeManager extends AbstractManager
{
    public function findAllQueryBuilder($limit, $offset)
    {
        return $this->createQueryBuilder('item')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
        ;
    }
}
