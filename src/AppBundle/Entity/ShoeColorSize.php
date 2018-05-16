<?php

namespace AppBundle\Entity;

class ShoeColorSize
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
     */
    private $size;

    /**
     * @var int
     */
    private $quantity;
}
