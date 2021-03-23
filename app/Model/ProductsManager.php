<?php

namespace App\Model;

use Nette;

class ProductsManager
{
	use Nette\SmartObject;

	private Nette\Database\Explorer $database;

	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

	public function getPublicProducts()
	{
		return $this->database->table('products');
	}
}
