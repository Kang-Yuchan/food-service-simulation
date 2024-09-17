<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodOrders;

use FoodServiceSimulation\FoodItems\FoodItem;

class FoodOrder
{
	/** @var FoodItem[] */
	private array $items;
	private string $orderTime;
	public function __construct(array $items)
	{
		$this->items = $items;
		$this->orderTime = date('Y-m-d H:i:s');
	}

	public function getItems(): array
	{
		return $this->items;
	}

	public function getOrderTime(): string
	{
		return $this->orderTime;
	}

	public function getTotalPrice(): float
	{
		$all_foods = $this->items;
		return array_reduce($all_foods, function ($total, FoodItem $item) {
			return $total + $item->getPrice();
		}, 0.0);
	}
}
