<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;

class Fettuccine extends FoodItem
{
	private const CATEGORY = 'Fettuccine';

	public function __construct()
	{
		parent::__construct("Fettuccine Alfredo", "Creamy fettuccine pasta with Parmesan cheese", 11.99);
	}

	protected static function getCategory(): string
	{
		return self::CATEGORY;
	}
}
