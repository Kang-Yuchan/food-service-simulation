<?php

declare(strict_types=1);

namespace FoodServiceSimulation\Persons;


abstract class Person
{
	protected string $name;
	protected int $age;
	protected string $address;

	public function __construct(string $name, int $age, string $address)
	{
		$this->name = $name;
		$this->age = $age;
		$this->address = $address;
	}
}
