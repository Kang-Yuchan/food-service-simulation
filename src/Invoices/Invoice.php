<?php

declare(strict_types=1);

namespace FoodServiceSimulation\Inovoices;

use FoodServiceSimulation\FoodOrders\FoodOrder;

class Invoice
{
	private FoodOrder $foodOrder;
	private float $finalPrice;
	private string $orderTime;
	private int $estimatedTimeInMinutes;
	public function __construct(FoodOrder $foodOrder, int $estimatedTimeInMinutes)
	{
		$this->foodOrder = $foodOrder;
		$this->orderTime = $foodOrder->getOrderTime();
		$this->estimatedTimeInMinutes = $estimatedTimeInMinutes;
		$this->finalPrice = $foodOrder->getTotalPrice();
	}


	public function getFinalPrice(): float
	{
		return $this->finalPrice;
	}

	public function getOrderTime(): string
	{
		return $this->orderTime;
	}

	public function getEstimatedTimeInMinutes(): int
	{
		return $this->estimatedTimeInMinutes;
	}

	public function getFoodOrder(): FoodOrder
	{
		return $this->foodOrder;
	}
}
