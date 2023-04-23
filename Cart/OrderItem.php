<?php

namespace Market\Cart;

use Market\Product;
use Market\User;

class OrderItem
{

	private User $user;
	private Product $product;
	private float $price;
	private int $quantity;

	public function __construct(User $user, Product $product, float $price, int $quantity)
	{
		$this->product = $product;
		$this->price = $price;
		$this->quantity = $quantity;
	}

	public function getProduct(): Product
	{
		return $this->product;
	}

	public function setProduct(Product $product): self
	{
		$this->product = $product;
		return $this;
	}

	public function getPrice(): float
	{
		return $this->price;
	}

	public function setPrice(float $price): self
	{
		$this->price = $price;
		return $this;
	}

	public function getQuantity(): int
	{
		return $this->quantity;
	}

	public function setQuantity(int $quantity): void
	{
		$this->quantity = $quantity;
	}

	public function getTotalPrice(): float
	{
		return $this->price * $this->quantity;
	}
}
