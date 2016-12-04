<?php

namespace AppBundle\Libs\ElasticSearch;

interface IElasticSearchDriver
{
	/**
	 * @param string $id
	 * @return array
	 */
	public function findById($id);
}
