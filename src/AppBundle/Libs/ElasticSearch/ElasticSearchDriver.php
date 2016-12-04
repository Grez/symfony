<?php

namespace AppBundle\Libs\ElasticSearch;

class ElasticSearchDriver implements IElasticSearchDriver
{
	/**
	 * @param string $id
	 * @return array
	 */
	public function findById($id)
	{
		return [
			'id' => $id,
			'name' => substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz', 5)), 0, 5),
			'type' => 'elastic',
		];
	}
}
