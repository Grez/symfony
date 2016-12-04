<?php

namespace AppBundle\Controller;

use AppBundle\Libs\Product\ProductRepository;
use AppBundle\Libs\VisitLogger\VisitLogger;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{

	/**
	 * @Route("/detail/{id}", name="detail_show")
	 */
	public function detailAction($id)
	{
		$product = $this->getProductRepository()->findById($id);

		$response = new JsonResponse();
		$response->setData($product);
		return $response;
	}

	/**
	 * @return ProductRepository
	 */
	private function getProductRepository()
	{
		return $this->get('app.productRepository');
	}
}
