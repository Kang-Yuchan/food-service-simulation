<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;


abstract class FoodItem
{
	protected string $name;
	protected string $description;
	protected float $price;

	public function __construct(string $name, string $description, float $price)
	{
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
	}

	abstract protected static function getCategory(): string;

	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Get the description of the food item
	 *
	 * @return string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * Get the price of the food item
	 *
	 * @return float
	 */
	public function getPrice(): float
	{
		return $this->price;
	}
}
