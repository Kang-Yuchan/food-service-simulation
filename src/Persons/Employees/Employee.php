<?php

declare(strict_types=1);

namespace FoodServiceSimulation\Persons\Employees;

use FoodServiceSimulation\Persons\Person;

class Employee extends Person
{
	protected int $employeeId;
	protected float $salary;

	public function __construct(string $name, int $age, string $address, int $employeeId, float $salary)
	{
		parent::__construct($name, $age, $address);
		$this->employeeId = $employeeId;
		$this->salary = $salary;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getEmployeeId(): int
	{
		return $this->employeeId;
	}

	public function getSalary(): float
	{
		return $this->salary;
	}
}
