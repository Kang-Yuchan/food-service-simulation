<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;

class Fettuccine extends FoodItem
{
	private const CATEGORY = 'Pasta';
	protected static function getCategory(): string
	{
		return self::CATEGORY;
	}
}
