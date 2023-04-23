<?php

namespace Market;

use Market\Product;

class ProductRepository
{
	/**
	 * @return \Market\Product
	 */
	public function getOneById(int $id): Product
	{
		return [];
	}

	/**
	 * @return \Market\Product[]
	 */
	public function findBy(array $params): array
	{
		return [];
	}

	/**
	 * @return \Market\Product
	 */
	public function save(Product $product): Product
	{
		return $product;
	}

	public function remove(Product $product): bool
	{
		return true;
	}

}