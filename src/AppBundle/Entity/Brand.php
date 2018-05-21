<?php

namespace AppBundle\Entity;

class Brand
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $slug;

    /** @var Shoe[] */
    private $shoes;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return Shoe[]
     */
    public function getShoes()
    {
        return $this->shoes;
    }

    /**
     * @param Shoe[] $shoes
     */
    public function setShoes($shoes)
    {
        $this->shoes = $shoes;
    }
}
