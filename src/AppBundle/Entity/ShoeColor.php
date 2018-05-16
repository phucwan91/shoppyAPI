<?php

namespace AppBundle\Entity;

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
     */
    private $color;

    /**
     * @var ShoeColorSize[]
     */
    private $sizes;

    /**
     * @var array
     */
    private $images;
}
