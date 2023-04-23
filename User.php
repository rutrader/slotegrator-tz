<?php

namespace Market;

class User {
	
	/**
	 * @var \Market\Product[]
	 */
	private $favorites;

	public function getFavorites(): array
	{
		return $this->favorites;
	}
	
}