<?php

namespace AppBundle\EntityManager;

use AppBundle\Pagination\PaginationFactory;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class ShoeManager extends AbstractManager
{
    /**
     * @var PaginationFactory
     */
    private $paginationFactory;

    public function __construct(ManagerRegistry $registry, $class, PaginationFactory $paginationFactory)
    {
        parent::__construct($registry, $class);
        $this->paginationFactory = $paginationFactory;
    }

    public function findAllQueryBuilder($limit, $offset)
    {
        return $this->createQueryBuilder('item')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
        ;
    }

    public function getPaginatedCollection(Request $request)
    {
        $itemsPerPage = $request->query->get('itemsPerPage', 10);
        $page = $request->query->get('page', 1);

        $qb = $this->findAllQueryBuilder($itemsPerPage, ($page*($itemsPerPage-1)));

        return $this->paginationFactory->createCollection($qb, $request, $itemsPerPage, $page, 'app.shoe.list');
    }
}
