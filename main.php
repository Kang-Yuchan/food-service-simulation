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

$interestedTastesMap = [
	"Margherita" => 1,
	"CheeseBurger" => 2,
	"Spaghetti" => 1
];

$Tom = new Customer("Tom", 20, "Saitama", $interestedTastesMap);

$invoice = $Tom->order($saizeriya);
$invoice->printInvoice();
