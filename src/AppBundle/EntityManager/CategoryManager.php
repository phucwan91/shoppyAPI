<?php

namespace AppBundle\EntityManager;

use AppBundle\Entity\Category;

class CategoryManager extends AbstractManager
{
    /**
     * @return Category[]
     */
    public function findAllParents()
    {
        return $this->createQueryBuilder('category')
            ->where('category.parent is null')
            ->orderBy('category.position')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllSubCategories(Category $category)
    {
        return $this->createQueryBuilder('category')
            ->where('category.parent = :category')
            ->setParameter('category', $category)
            ->orderBy('category.position')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getCategoryTree()
    {
        $categories = $this->findAllParents();

        foreach ($categories as $category) {
            $category->setChildren($this->findAllSubCategories($category));
        }

        return $categories;
    }
}
