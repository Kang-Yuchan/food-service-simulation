<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;

class Spaghetti extends FoodItem
{
	private const CATEGORY = 'Spaghetti';

	public function __construct()
	{
		parent::__construct("Spaghetti", "Classic Italian pasta with tomato sauce", 9.99);
	}


	public static function getCategory(): string
	{
		return self::CATEGORY;
	}
}
