<?php

namespace Market;

use Market\Product;
use Market\User;

class UserService
{

	/**
	 * @var \Market\User
	 */
	private User $user;

	/**
	 * @var \Market\Product
	 */
	private Product $product;

	public function toggleFavorite(User $user, Product $product)
	{
		if(!$product->isFavorite($user)) {
			return $this->addToFavorites($user, $product);
		} else {
			$this->removeFromFavorites($user, $product);
		}
	}

	/**
	 * @var \Market\User
	 * @var \Market\Product
	 */
	private function addToFavorites(User $user, Product $product)
	{
		// $userProduct->addProduct(['user' => $user, 'product' => $product);
	}

	private function removeFromFavorites(User $user, Product $product)
	{
		// $userProduct->remove(['user' => $user, 'product' => $product]);
	}

} 