<?php

declare(strict_types=1);

namespace FoodServiceSimulation\Persons\Employees;

use FoodServiceSimulation\FoodOrders\FoodOrder;
use FoodServiceSimulation\FoodItems\FoodItem;

class Chef extends Employee
{
	public function __construct(string $name, int $age, string $address, int $employeeId, float $salary)
	{
		parent::__construct($name, $age, $address, $employeeId, $salary);
	}

	public function prepareFood(FoodOrder $order): string
	{
		$preparedItems = [];
		$itemCounts = [];

		foreach ($order->getItems() as $item) {
			$itemName = $item->getName();
			$itemCounts[$itemName] = ($itemCounts[$itemName] ?? 0) + 1;
			$preparedItems[] = "{$this->name} was cooking {$itemName}.";
		}

		$totalTime = $this->calculateTotalCookingTime($order);
		$preparedItems[] = "{$this->name} took {$totalTime} minutes to cook.";

		return implode("\n", $preparedItems);
	}

	private function calculateTotalCookingTime(FoodOrder $order): int
	{
		return array_reduce($order->getItems(), function ($total, FoodItem $item) {
			return $total + $item->getCookingTimeMinutes();
		}, 0);
	}
}
