<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;

class HawaiianPizza extends FoodItem
{
	private const CATEGORY = 'Pizza';
	protected static function getCategory(): string
	{
		return self::CATEGORY;
	}
}
