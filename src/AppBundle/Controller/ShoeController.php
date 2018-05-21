<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ShoeController extends Controller
{
    public function listAction()
    {
        $shoes = $this->get('app.manager.shoe')->findAll();

        return new Response($this->get('jms_serializer')->serialize($shoes, 'json'));
    }

    public function singleAction()
    {

    }
}
