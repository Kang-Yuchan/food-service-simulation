<?php

declare(strict_types=1);
require "vendor/autoload.php";

use FoodServiceSimulation\FoodItems\CheeseBurger;
use FoodServiceSimulation\FoodItems\Fettuccine;
use FoodServiceSimulation\FoodItems\HawaiianPizza;
use FoodServiceSimulation\FoodItems\Spaghetti;
use FoodServiceSimulation\Persons\Employees\Cashier;
use FoodServiceSimulation\Persons\Employees\Chef;
use FoodServiceSimulation\Persons\Customers\Customer;
use FoodServiceSimulation\Restaurants\Restaurant;


$cheeseBurger = new CheeseBurger();
$fettuccine = new Fettuccine();
$hawaiianPizza = new HawaiianPizza();
$spaghetti = new Spaghetti();


$Inayah = new Chef("Inayah Lozano", 40, "Osaka", 1, 30);
$Nadia = new Cashier("Nadia Valentine", 21, "Tokyo", 1, 20);

$saizeriya = new Restaurant(
	[
		$cheeseBurger,
		$fettuccine,
		$hawaiianPizza,
		$spaghetti
	],
	[
		$Inayah,
		$Nadia
	]
);

function generateRandomInterestedTastes(array $availableCategories, int $minItems = 1, int $maxItems = 3): array
{
	$numItems = rand($minItems, $maxItems);
	$selectedCategories = array_rand(array_flip($availableCategories), $numItems);

	if (!is_array($selectedCategories)) {
		$selectedCategories = [$selectedCategories];
	}

	$interestedTastesMap = [];
	foreach ($selectedCategories as $category) {
		$interestedTastesMap[$category] = rand(1, 3);  // 1から3の間でランダムな数量
	}

	return $interestedTastesMap;
}

$availableCategories = ['Margherita', 'CheeseBurger', 'Spaghetti', 'HawaiianPizza', 'Fettuccine'];

$interestedTastesMap = generateRandomInterestedTastes($availableCategories);

$names = ['Tom', 'Alice', 'Bob', 'Carol', 'Dave'];
$randomName = $names[array_rand($names)];

$age = rand(18, 60);

$cities = ['Tokyo', 'Osaka', 'Nagoya', 'Sapporo', 'Fukuoka'];
$randomCity = $cities[array_rand($cities)];

$customer = new Customer($randomName, $age, $randomCity, $interestedTastesMap);

$invoice = $customer->order($saizeriya);
$invoice->printInvoice();
