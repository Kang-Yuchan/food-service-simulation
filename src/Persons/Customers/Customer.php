<?php

declare(strict_types=1);

namespace FoodServiceSimulation\Persons\Customers;

use FoodServiceSimulation\Persons\Person;
use FoodServiceSimulation\Restaurants\Restaurant;
use FoodServiceSimulation\Invoices\Invoice;
use FoodServiceSimulation\FoodItems\FoodItem;

class Customer extends Person
{
	/** @var array<string, int> */
	private array $interestedCategories;

	/**
	 * @param string $name
	 * @param int $age
	 * @param string $address
	 * @param array<string, int> $interestedCategories
	 */
	public function __construct(string $name, int $age, string $address, array $interestedCategories)
	{
		parent::__construct($name, $age, $address);
		$this->interestedCategories = $interestedCategories;
	}

	/**
	 * @return array<string, int>
	 */
	public function getInterestedCategories(): array
	{
		return $this->interestedCategories;
	}

	public function order(Restaurant $restaurant): Invoice
	{
		echo $this->name . " wanted to eat " . implode(', ', array_keys($this->interestedCategories)) . "\n";
		$exisInterestedItemsSummary = $this->getInterestedItemsSummary($restaurant);
		echo $this->name . " was looking at the menu, and ordered " . $exisInterestedItemsSummary . "\n";
		return $restaurant->order($this->interestedCategories);
	}

	public function getInterestedItemsSummary(Restaurant $restaurant): string
	{
		$menu = $restaurant->getMenu();
		$interestedItemsSummary = [];

		foreach ($this->interestedCategories as $category => $quantity) {
			$menuItem = $this->findMenuItemByCategory($menu, $category);
			if ($menuItem) {
				$interestedItemsSummary[] = "{$menuItem::getCategory()} x {$quantity}";
			}
		}

		return implode(', ', $interestedItemsSummary);
	}

	private function findMenuItemByCategory(array $menu, string $category): ?FoodItem
	{
		foreach ($menu as $item) {
			if ($item::getCategory() === $category) {
				return $item;
			}
		}
		return null;
	}
}
