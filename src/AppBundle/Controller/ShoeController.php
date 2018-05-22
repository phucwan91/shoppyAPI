<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShoeController extends Controller
{
    public function listAction(Request $request)
    {
        return new Response(
            $this->get('jms_serializer')->serialize(
                $this->get('app.manager.shoe')->getPaginatedCollection($request), 'json'
            ),
            200,
            ['Content-Type' => 'application/json']
        );
    }

    public function singleAction()
    {

    }
}
