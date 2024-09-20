<?php

declare(strict_types=1);

namespace FoodServiceSimulation\Persons\Employees;

use FoodServiceSimulation\FoodOrders\FoodOrder;
use FoodServiceSimulation\Invoices\Invoice;

class Cashier extends Employee
{
	public function __construct(string $name, int $age, string $address, int $employeeId, float $salary)
	{
		parent::__construct($name, $age, $address, $employeeId, $salary);
	}

	public function generateOrder(array $categories, array $menu): FoodOrder
	{
		$orderedItems = [];
		foreach ($categories as $category) {
			foreach ($menu as $item) {
				if ($item::getCategory() === $category) {
					$orderedItems[] = $item;
					break;
				}
			}
		}
		return new FoodOrder($orderedItems);
	}

	public function generateInvoice(FoodOrder $order): Invoice
	{
		return new Invoice($order, $this->estimateCookingTime($order));
	}

	private function estimateCookingTime(FoodOrder $order): int
	{
		$totalTime = 0;
		foreach ($order->getItems() as $item) {
			$totalTime += $item->getCookingTimeMinutes();
		}
		return $totalTime;
	}
}
