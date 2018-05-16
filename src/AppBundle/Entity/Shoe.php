<?php

namespace AppBundle\Entity;

class Shoe
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $category;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $description;

    /**
     * @var ShoeColor[]
     */
    private $colors;
}
