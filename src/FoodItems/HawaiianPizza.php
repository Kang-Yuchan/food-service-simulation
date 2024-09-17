<?php

declare(strict_types=1);

namespace FoodServiceSimulation\FoodItems;

class HawaiianPizza extends FoodItem
{
	private const CATEGORY = 'HawaiianPizza';

	public function __construct()
	{
		parent::__construct("Hawaiian Pizza", "A classic pizza with ham and pineapple", 12.99);
	}

	public static function getCategory(): string
	{
		return self::CATEGORY;
	}
}
