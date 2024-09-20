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
		return array_reduce($this->items, function ($total, FoodItem $item) {
			return $total + $item->getPrice();
		}, 0.0);
	}

	public function getItemCounts(): array
	{
		$counts = [];
		foreach ($this->items as $item) {
			$key = $item->getName(); // または他の一意の識別子
			$counts[$key] = ($counts[$key] ?? 0) + 1;
		}
		return $counts;
	}
}
