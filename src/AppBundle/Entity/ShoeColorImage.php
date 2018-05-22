<?php

namespace AppBundle\Entity;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("all")
 */
class ShoeColorImage
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var ShoeColor
     */
    private $shoeColor;

    /**
     * @var string
     * @Serializer\Expose()
     */
    private $small;

    /**
     * @var string
     * @Serializer\Expose()
     */
    private $medium;

    /**
     * @var string
     * @Serializer\Expose()
     */
    private $large;

    /**
     * @return string
     */
    public function getSmall()
    {
        return $this->small;
    }

    /**
     * @param string $small
     */
    public function setSmall($small)
    {
        $this->small = $small;
    }

    /**
     * @return string
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * @param string $medium
     */
    public function setMedium($medium)
    {
        $this->medium = $medium;
    }

    /**
     * @return string
     */
    public function getLarge()
    {
        return $this->large;
    }

    /**
     * @param string $large
     */
    public function setLarge($large)
    {
        $this->large = $large;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ShoeColor
     */
    public function getShoeColor()
    {
        return $this->shoeColor;
    }

    /**
     * @param ShoeColor $shoeColor
     */
    public function setShoeColor($shoeColor)
    {
        $this->shoeColor = $shoeColor;
    }
}
