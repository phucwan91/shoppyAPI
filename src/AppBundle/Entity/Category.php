<?php

namespace AppBundle\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     * @Serializer\Expose()
     * @Serializer\Groups({"detail"})
     */
    private $name;

    /**
     * @var string
     * @Serializer\Expose()
     * @Serializer\Groups({"init"})
     */
    private $slug;

    /**
     * @var Gender
     */
    private $gender;

    /**
     * @var Shoe[]
     */
    private $shoes;

    /**
     * @var int
     */
    private $position;

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
     * @return Gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param Gender $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
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

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }
}
