<?php

namespace AppBundle\Libs\VisitLogger;

interface ILoggerStorage
{
	public function logVisit(string $name, int $id);
}
