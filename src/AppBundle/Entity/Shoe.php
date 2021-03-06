<?php

namespace AppBundle\Entity;

use AppBundle\Annotation\Link;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 * @Link(
 *     "self",
 *     route="app.shoe.detail",
 *     params={"slug": "object.getSlug()"}
 * )
 */
class Shoe
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     * @Serializer\Expose()
     * @Serializer\Groups({"init"})
     */
    private $category;

    /**
     * @var Brand
     * @Serializer\Expose()
     * @Serializer\Groups({"init"})
     */
    private $brand;

    /**
     * @var string
     * @Serializer\Expose()
     * @Serializer\Groups({"init"})
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var float
     * @Serializer\Expose()
     * @Serializer\Groups({"init"})
     */
    private $price;

    /**
     * @var string
     * @Serializer\Expose()
     */
    private $description;

    /**
     * @var ShoeColor[]
     * @Serializer\Expose()
     * @Serializer\Groups({"init"})
     */
    private $colors;

    /**
     * @var int
     * @Serializer\Expose()
     * @Serializer\Groups({"init"})
     */
    private $position;

    /**
     * @var int
     * @Serializer\Expose()
     * @Serializer\Groups({"init"})
     */
    private $featuredPriority;

    /**
     * @var int
     */
    private $salesCount;

    /**
     * @var \DateTime
     * @Serializer\Expose()
     * @Serializer\Groups({"init"})
     */
    private $releaseDate;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
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
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return ShoeColor[]
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * @param ShoeColor[] $colors
     */
    public function setColors($colors)
    {
        $this->colors = $colors;
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

    /**
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param \DateTime $releaseDate
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return int
     */
    public function getFeaturedPriority()
    {
        return $this->featuredPriority;
    }

    /**
     * @param int $featuredPriority
     */
    public function setFeaturedPriority($featuredPriority)
    {
        $this->featuredPriority = $featuredPriority;
    }

    /**
     * @return int
     */
    public function getSalesCount()
    {
        return $this->salesCount;
    }

    /**
     * @param int $salesCount
     */
    public function setSalesCount($salesCount)
    {
        $this->salesCount = $salesCount;
    }
}
