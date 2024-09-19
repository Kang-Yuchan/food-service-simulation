<?php

declare(strict_types=1);

namespace FoodServiceSimulation\Persons;

use FoodServiceSimulation\Persons\Person;
use FoodServiceSimulation\Restaurants\Restaurant;
use FoodServiceSimulation\Inovoices\Invoice;

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
		$categories = array_keys($this->interestedCategories);
		return $restaurant->order($categories);
	}
}
