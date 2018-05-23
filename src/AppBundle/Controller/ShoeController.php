<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ShoeController extends Controller
{
    public function listAction(Request $request)
    {
        $limit    = $request->query->get('itemsPerPage', 10);
        $page     = $request->query->get('page', 1);
        $category = $request->query->get('category');
        $brands   = $request->query->get('brands', []);
        $orderBy  = $request->query->get('orderBy');
        $order    = $request->query->get('order');
        $offset   = $limit * ($page - 1);

        $categoryManager = $this->get('app.manager.category');
        $brandManager = $this->get('app.manager.brand');
        $shoeManager = $this->get('app.manager.shoe');

//        $categories = $this->get('app.manager.category')->findAll();
//        $allBrands = $this->get('app.manager.brand')->findAll();

        if ($category) {
            /** @var Category $category */
            $category = $categoryManager->findOneBy(['slug' => $category]);

            if (!$category) {
                return [];
            }
        }

        if ($brands) {
            $brands = $brandManager->findBy(['slug' => $brands]);

            if (empty($brands)) {
                return [];
            }
        }

        $qb = $shoeManager->findByQueryBuilder($category, $brands, $orderBy, $order, $limit, $offset);

        return new Response(
            $this->get('jms_serializer')->serialize(
                $this->get('app.pagination_factory')->createCollection($qb, $request, $limit, $page, 'app.shoe.list'), 'json'
            ),
            200,
            ['Content-Type' => 'application/json']
        );
    }

    public function detailAction($slug)
    {
        $shoe = $this->get('app.manager.shoe')->findOneBy(['slug' => $slug]);

        if (!$shoe) {
            throw new NotFoundHttpException(sprintf('Not found shoe with slug: "%s"!', $slug));
        }

        return new Response(
            $this->get('jms_serializer')->serialize($shoe, 'json'),
            200,
            ['Content-Type' => 'application/json']
        );
    }
}
