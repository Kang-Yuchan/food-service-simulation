<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;


abstract class FoodItem
{
	protected string $name;
	protected string $description;
	protected int $price;

	public function __construct(string $name, string $description, int $price)
	{
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
	}

	abstract protected static function getCategory(): string;
}
