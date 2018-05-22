<?php

namespace AppBundle\Controller;

use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    public function initAction(Request $request)
    {
        $genders    = $this->get('app.manager.gender')->findAll();
        $categories = $this->get('app.manager.category')->findAll();
        $shoes      = $this->get('app.manager.shoe')->getPaginatedCollection($request);

        $data['genders'] = [
            'items' => $genders
        ];

        $data['categories'] = [
            'items' => $categories
        ];

        $data['shoes'] = $shoes;

        return new Response(
            $this->get('jms_serializer')->serialize(
                $data,
                'json',
                SerializationContext::create()->setGroups(['init'])
            ),
            200,
            [
                'Content-Type' => 'application/json'
            ]
        );
    }
}
