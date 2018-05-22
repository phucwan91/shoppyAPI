<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShoeController extends Controller
{
    public function listAction(Request $request)
    {
        $itemsPerPage = $request->query->get('itemsPerPage', 10);
        $page = $request->query->get('page', 1);

        $qb = $this->get('app.manager.shoe')
            ->findAllQueryBuilder($itemsPerPage, ($page*($itemsPerPage-1)));

        $paginatedCollection = $this->get('app.pagination_factory')
            ->createCollection($qb, $itemsPerPage, $page, 'app.shoe.list');

        return new Response($this->get('jms_serializer')->serialize($paginatedCollection, 'json'), 200, [
            'Content-Type' => 'application/json'
        ]);
    }

    public function singleAction()
    {

    }
}
