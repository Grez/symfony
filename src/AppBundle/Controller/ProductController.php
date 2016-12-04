<?php

namespace AppBundle\Controller;

use AppBundle\Libs\Product\ProductRepository;
use AppBundle\Libs\VisitLogger\Logger;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends Controller
{
	/**
	 * @Route("/detail/{id}", name="detail_show")
	 */
	public function detailAction(int $id)
	{
		$cachedProduct = $this->getCache()->getItem('product-detail' . $id);
		if (!$cachedProduct->isHit()) {
			$product = $this->getProductRepository()->findById($id);
			$cachedProduct->expiresAfter(60);
			$cachedProduct->set($product);
			$this->getCache()->save($cachedProduct);
		} else {
			$product = $cachedProduct->get();
		}
		$this->getLogger()->logVisit('product-detail', $id);

		$response = new JsonResponse();
		$response->setData($product);
		return $response;
	}

	/**
	 * @return Logger
	 */
	private function getLogger()
	{
		return $this->get('app.visitLogger');
	}

	/**
	 * @return ProductRepository
	 */
	private function getProductRepository()
	{
		return $this->get('app.productRepository');
	}

	/**
	 * @return AbstractAdapter
	 */
	private function getCache()
	{
		return $this->get('cache.app');
	}
}
