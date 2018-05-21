<?php

namespace AppBundle\EntityManager;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\QueryBuilder;

class AbstractManager
{
    /**
     * @var string
     */
    protected $class;

    /**
     * @var ManagerRegistry
     */
    private $registry;

    /**
     * @param ManagerRegistry $registry
     * @param string          $class
     */
    public function __construct(ManagerRegistry $registry, $class)
    {
        $this->class    = $class;
        $this->registry = $registry;
    }

    /**
     * @param string $entity
     *
     * @return QueryBuilder
     */
    public function createQueryBuilder($entity = 'entity')
    {
        return $this->getRepository()->createQueryBuilder($entity);
    }

    /**
     * @return ObjectManager
     */
    public function getObjectManager()
    {
        $manager = $this->registry->getManagerForClass($this->class);
        if (!$manager) {
            throw new \RuntimeException(sprintf(
                'Unable to find the mapping information for the class %s.'
                .' Please check the `auto_mapping` option'
                .' (http://symfony.com/doc/current/reference/configuration/doctrine.html#configuration-overview)'
                .' or add the bundle to the `mappings` section in the doctrine configuration.',
                $this->class
            ));
        }

        return $manager;
    }

    /**
     * Get repository.
     *
     * @return ObjectRepository
     */
    public function getRepository()
    {
        return $this->getObjectManager()->getRepository($this->class);
    }

    public function getClass()
    {
        return $this->class;
    }

    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->getRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function findOneBy(array $criteria)
    {
        return $this->getRepository()->findOneBy($criteria);
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    public function create()
    {
        return new $this->class();
    }

    public function save($entity, $andFlush = true)
    {
        $this->checkObject($entity);
        $this->getObjectManager()->persist($entity);
        if ($andFlush) {
            $this->getObjectManager()->flush();
        }
    }

    public function delete($entity, $andFlush = true)
    {
        $this->checkObject($entity);
        $this->getObjectManager()->remove($entity);
        if ($andFlush) {
            $this->getObjectManager()->flush();
        }
    }

    /**
     * @param $object
     */
    protected function checkObject($object)
    {
        if (!$object instanceof $this->class) {
            throw new \InvalidArgumentException(sprintf(
                'Object must be instance of %s, %s given',
                $this->class, is_object($object) ? get_class($object) : gettype($object)
            ));
        }
    }
}
