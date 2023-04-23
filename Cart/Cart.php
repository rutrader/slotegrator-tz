<?php

namespace Market\Cart;

use Market\User;

class Order
{
	/**
	 * @var \Market\Cart\OrderItem[]
	 */
	private array $items = [];


	public function __construct(User $user)
	{
		
	}

	/**
	 * @return float;
	 */
	public function calculateTotalSum(): float
	{
		$totalSum = 0;

		foreach ($this->items as $item) {
			$totalSum += $item->getTotalPrice();
		}

		return $totalSum;
	}

	public function getItems(): array
	{
		return $this->items;
	}

	public function getItemsCount(): int
	{
		return count($this->items);
	}

	public function addItem(OrderItem $item): void
	{
		$this->items[] = $item;
	}

	public function deleteItem(OrderItem $itemToDelete): void
	{
		$this->items = array_filter($this->items, function (OrderItem $item) use ($itemToDelete) {
			return $item !== $itemToDelete;
		});
	}

	/**
	 * @return string
	 */
	public function printOrder(): string
	{
		$orderDetails = "";

		foreach ($this->items as $item) {
			$orderDetails .= $item->getProduct()->getName() . " - " . $item->getPrice() . " x " . $item->getQuantity() . PHP_EOL;
		}

		$orderDetails .= "Total: " . $this->calculateTotalSum();

		return $orderDetails;
	}

	public function showOrder()
	{
		return $this->printOrder();
	}

	public function load(): void
	{
		// $this->orderRepository->findByUser($user);
	}

	public function save(): void
	{
		// $this->orderRepository->save($items)
	}

	public function update(): void
	{
		// $this->orderRepository->update($items)
	}

	public function delete(): void
	{
		// $this->orderRepository($items)
	}
}
