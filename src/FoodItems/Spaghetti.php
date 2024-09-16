<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;

class Spaghetti extends FoodItem
{
	private const CATEGORY = 'Pasta';
	protected static function getCategory(): string
	{
		return self::CATEGORY;
	}
}
