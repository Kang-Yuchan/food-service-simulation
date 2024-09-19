<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;


abstract class FoodItem
{
	protected string $name;
	protected string $description;
	protected float $price;
	protected int $cookingTimeMinutes;

	public function __construct(string $name, string $description, float $price, int $cookingTimeMinutes)
	{
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
		$this->cookingTimeMinutes = $cookingTimeMinutes;
	}

	abstract public static function getCategory(): string;

	public function getName(): string
	{
		return $this->name;
	}

	public function getDescription(): string
	{
		return $this->description;
	}

	public function getPrice(): float
	{
		return $this->price;
	}

	public function getCookingTimeMinutes(): int
	{
		return $this->cookingTimeMinutes;
	}
}
