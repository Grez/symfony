<?php

namespace AppBundle\Libs\Product;

use AppBundle\Libs\ElasticSearch\IElasticSearchDriver;
use AppBundle\Libs\MySQL\IMySQLDriver;

class ProductRepository
{

	/**
	 * @var IMySQLDriver
	 */
	private $mySQLDriver;

	/**
	 * @var IElasticSearchDriver
	 */
	private $elasticSearchDriver;

	/**
	 * @var bool
	 */
	private $elasticAllowed = TRUE;



	public function __construct(IMySQLDriver $mySQLDriver, IElasticSearchDriver $elasticSearchDriver)
	{
		$this->mySQLDriver = $mySQLDriver;
		$this->elasticSearchDriver = $elasticSearchDriver;
	}

	/**
	 * @param string $id
	 * @return array
	 */
	public function findById(string $id)
	{
		if ($this->elasticAllowed) {
			return $this->elasticSearchDriver->findById($id);
		} else {
			return $this->mySQLDriver->findProduct($id);
		}
	}

	/**
	 * @param bool $elasticAllowed
	 * @return ProductRepository
	 */
	public function setElasticAllowed(bool $elasticAllowed)
	{
		$this->elasticAllowed = $elasticAllowed;
		return $this;
	}
}
