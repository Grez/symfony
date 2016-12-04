<?php

namespace AppBundle\Libs\VisitLogger;

class Logger
{

	/**
	 * @var ILoggerStorage
	 */
	private $storage;

	public function __construct(ILoggerStorage $storage)
	{
		$this->storage = $storage;
	}

	public function logVisit(string $name, string $id)
	{
		$this->storage->logVisit($name, $id);
	}
}
