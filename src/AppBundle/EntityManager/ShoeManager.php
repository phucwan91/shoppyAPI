<?php

namespace AppBundle\EntityManager;

use AppBundle\Entity\Category;
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
        return $this->createQueryBuilder('shoe')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
        ;
    }

    public function findByQueryBuilder(
        Category $category = null,
        array $brand = [],
        $orderBy = null,
        $order = 'ASC',
        $limit,
        $offset
    ) {
        $qb = $this->findAllQueryBuilder($limit, $offset);

        if ($category) {
            $qb->andWhere('shoe.category = :category')
                ->setParameter('category', $category);
        }

        if ($brand) {
            $qb->andWhere('shoe.brand = :brand')
                ->setParameter('brand', $brand);
        }

        if ($orderBy) {
            $qb->orderBy('shoe.'.$orderBy, $order);
        }

        return $qb;
    }

    public function findAllOrderedByPositionQueryBuilder($limit, $offset)
    {
        return $this->findAllQueryBuilder($limit, $offset)
            ->orderBy('shoe.position')
        ;
    }

    public function findFeaturedShoes($limit, $offset)
    {
        return $this->findAllQueryBuilder($limit, $offset)
            ->andWhere('shoe.featuredPriority > 0')
            ->orderBy('shoe.featuredPriority', 'DESC')
            ->innerJoin('AppBundle:Brand', 'brand', 'WITH', 'shoe.brand = brand.id')
            ->leftJoin('AppBundle:ShoeColor', 'shoeColor', 'WITH', 'shoe.id = shoeColor.shoe')
            ->leftJoin('AppBundle:ShoeColorImage', 'shoeColorImage', 'WITH', 'shoeColor.id = shoeColorImage.shoeColor')
            ->addSelect('brand')
            ->addSelect('shoeColor')
            ->addSelect('shoeColorImage')
            ->getQuery()
            ->getResult()
        ;
    }
}
