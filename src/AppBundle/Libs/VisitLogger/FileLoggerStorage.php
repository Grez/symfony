<?php

namespace AppBundle\Libs\VisitLogger;

class FileLoggerStorage implements ILoggerStorage
{
	/**
	 * @var string
	 */
	private $folder;

	public function __construct(string $folder)
	{
		$this->folder = $folder;
	}

	/**
	 * Very naive solution
	 * doesn't check for chmod / errors etc.
	 * PATH folder would have .gitignore
	 *
	 * @param string $name
	 * @param int $id
	 */
	public function logVisit(string $name, int $id)
	{
		$filePath = $this->getFilePath($name, $id);
		$value = intVal(@file_get_contents($filePath)) ?: 0;
		file_put_contents($filePath, ++$value);
	}

	/**
	 * @param string $name
	 * @param int $id
	 * @return string
	 */
	private function getFilePath(string $name, int $id)
	{
		// @TODO: $id should be escaped for characters such as "/" etc.
		return __DIR__ . $this->folder . '/' . $name . '-' . $id . '.txt';
	}
}
