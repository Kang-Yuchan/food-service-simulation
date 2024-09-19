<?php

declare(strict_types=1);

namespace FoodServiceSimulation\Restaurants;

use FoodServiceSimulation\FoodItems\FoodItem;
use FoodServiceSimulation\Persons\Employee;
use FoodServiceSimulation\Inovoices\Invoice;
use FoodServiceSimulation\FoodOrders\FoodOrder;

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

	public function order(array $categories): Invoice
	{
		// 1. カテゴリーに基づいて注文アイテムを決定
		$orderedItems = $this->determineOrderedItems($categories);

		// 2. FoodOrderオブジェクトを生成
		$foodOrder = new FoodOrder($orderedItems);

		// 3. 注文を処理（料理の準備など）
		$estimatedTimeInMinutes = $this->processOrder($foodOrder);

		// 4. 請求書を生成
		$invoice = new Invoice($foodOrder, $estimatedTimeInMinutes);

		return $invoice;
	}

	/**
	 * @param string[] $categories
	 * @return FoodItem[]
	 */
	private function determineOrderedItems(array $categories): array
	{
		$orderedItems = [];
		foreach ($categories as $category) {
			foreach ($this->menu as $item) {
				if ($item::getCategory() === $category) {
					$orderedItems[] = $item;
					break;
				}
			}
		}
		return $orderedItems;
	}

	private function processOrder(FoodOrder $order): int
	{
		$totalTime = 0;
		foreach ($order->getItems() as $item) {
			$cookingTime = $item->getCookingTimeMinutes();
			$totalTime += $cookingTime;
		}
		return $totalTime;
	}
}
