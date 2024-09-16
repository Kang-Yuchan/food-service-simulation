<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;

class CheeseBurger extends FoodItem
{
	private const CATEGORY = 'Burger';
	protected static function getCategory(): string
	{
		return self::CATEGORY;
	}
}
