<?php

declare(strict_types=1);

namespace FoodServiceSimulation\Restaurants;

use FoodServiceSimulation\FoodItems\FoodItem;
use FoodServiceSimulation\Persons\Employees\Employee;
use FoodServiceSimulation\Invoices\Invoice;
use FoodServiceSimulation\FoodOrders\FoodOrder;
use FoodServiceSimulation\Persons\Employees\Cashier;
use FoodServiceSimulation\Persons\Employees\Chef;

class Restaurant
{
	/** @var FoodItem[] */
	private array $menu;

	/** @var Employee[] */
	private array $employees;

	public function __construct(array $menu, array $employees)
	{
		$this->menu = $menu;
		$this->employees = $employees;
	}

	public function getMenu()
	{
		return $this->menu;
	}

	public function order(array $categories): Invoice
	{
		$cashier = $this->findEmployeeByType(Cashier::class);
		// 1. カテゴリーに基づいて注文アイテムを決定
		$orderedItems = $this->determineOrderedItems($cashier, $categories);

		// 2. FoodOrderオブジェクトを生成
		$foodOrder = new FoodOrder($orderedItems);

		// 3. 注文を処理（料理の準備など）
		$this->processOrder($foodOrder);

		// 4. 請求書を生成
		if ($cashier instanceof Cashier) {
			$invoice = $cashier->generateInvoice($foodOrder);
			echo "{$cashier->getName()} made the invoice.\n";
			return $invoice;
		}
	}

	/**
	 * @param string[] $categories
	 * @return FoodItem[]
	 */
	private function determineOrderedItems(Cashier $cashier, array $categories): array
	{
		echo "{$cashier->getName()} received the order.\n";
		$orderedItems = [];
		foreach ($categories as $category => $quantity) {
			foreach ($this->menu as $item) {
				if ($item::getCategory() === $category) {
					for ($i = 0; $i < $quantity; $i++) {
						$orderedItems[] = clone $item;
					}
					break;
				}
			}
		}
		return $orderedItems;
	}

	private function processOrder(FoodOrder $order): void
	{
		$chef = $this->findEmployeeByType(Chef::class);
		if ($chef instanceof Chef) {
			$preparationProcess = $chef->prepareFood($order);
			echo $preparationProcess . "\n";
		} else {
			echo "No chef available to prepare the food.\n";
		}
	}

	private function findEmployeeByType(string $type): ?Employee
	{
		foreach ($this->employees as $employee) {
			if ($employee instanceof $type) {
				return $employee;
			}
		}
		return null;
	}
}
