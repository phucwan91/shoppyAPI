<?php

namespace AppBundle\Entity;

class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
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
}
