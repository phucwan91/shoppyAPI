<?php

namespace AppBundle\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class ShoeColor
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Shoe
     */
    private $shoe;

    /**
     * @var Color
     * @Serializer\Expose()
     */
    private $color;

    /**
     * @var ShoeColorImage[]
     * @Serializer\Expose()
     */
    private $images;

    /**
     * @var ShoeColorSize[]
     * @Serializer\Expose()
     */
    private $sizes;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Shoe
     */
    public function getShoe()
    {
        return $this->shoe;
    }

    /**
     * @param Shoe $shoe
     */
    public function setShoe($shoe)
    {
        $this->shoe = $shoe;
    }

    /**
     * @return Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param Color $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return ShoeColorImage[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ShoeColorImage[] $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return ShoeColorSize[]
     */
    public function getSizes()
    {
        return $this->sizes;
    }

    /**
     * @param ShoeColorSize[] $sizes
     */
    public function setSizes($sizes)
    {
        $this->sizes = $sizes;
    }
}
