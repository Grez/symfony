<?php

namespace AppBundle\Libs\MySQL;

class MySQLDriver implements IMySQLDriver
{
	public function findProduct($id)
	{
		return [
			'id' => $id,
			'name' => substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz', 5)), 0, 5),
			'type' => 'mysql',
		];
	}
}
