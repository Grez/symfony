<?php

namespace AppBundle\Libs\MySQL;

interface IMySQLDriver
{
	/**
	 * @param string $id
	 * @return array
	 */
	public function findProduct($id);
}
