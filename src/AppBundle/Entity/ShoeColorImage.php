<?php

namespace AppBundle\Entity;

class ShoeColorImage
{
    /** @var int */
    private $id;

    /** @var Shoe */
    private $shoe;

    /** @var Color */
    private $color;

    /** @var string */
    private $small;

    /** @var string */
    private $medium;

    /** @var string */
    private $large;

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
}
