<?php

namespace AppBundle\Pagination;

class PaginatedCollection
{
    private $items;

    private $total;

    private $count;

    private $totalPages;

    private $_links;

    public function __construct($items, $total, $totalPages)
    {
        $this->items = $items;
        $this->total = $total;
        $this->totalPages = $totalPages;
        $this->count = count($items);
    }

    public function addLink($rel, $url)
    {
        $this->_links[$rel] = $url;
    }
}
