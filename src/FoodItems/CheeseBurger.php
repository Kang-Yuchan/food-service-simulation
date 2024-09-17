<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;

class CheeseBurger extends FoodItem
{
	private const CATEGORY = 'CheeseBurger';

	public function __construct()
	{
		parent::__construct("Cheese Burger", "Juicy beef patty with melted cheese", 8.99);
	}

	public static function getCategory(): string
	{
		return self::CATEGORY;
	}
}
