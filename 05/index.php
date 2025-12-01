<?php

require 'Progress.php';
require 'Product.php';
require 'Cart.php';
require 'Prepare.php';
require 'Delivery.php';

//lista produktów 
$pizza = new Product('Pizza');
$burger = new Product('Burger');
$sushi = new Product('Sushi');

//Menu
echo "Menu:<br>";
$view = new Cart();
$view->addProduct($pizza);
$view->addProduct($sushi);
$view->addProduct($burger);
$view->viewProducts();

echo "<br>";
// koszyk 1
$cart = new Cart();
$cart->addProduct($pizza);
$cart->addProduct($pizza);
$cart->addProduct($burger);
$cart->removeProduct(2);
$cart->addProduct($sushi);

$order = $cart->getProducts();
echo "Zamówienie 1:<br>";
$cart->viewProducts();

echo '<br>';
$prepare = new Prepare($order);
$status = $prepare->changeStatus();
$status = $prepare->changeStatus();

echo "Przygotowanie: ";
print_r($status);
echo '<br><br>';

$delivery = new Deliver($order);
$status = $delivery->changeStatus();
$status = $delivery->changeStatus();
$status = $delivery->changeStatus();
echo "Dostawa: ";
print_r($status);
echo '<br><br>';

//koszyk 2
$cart2 = new Cart();
$cart2->addProduct($burger);

echo "Zamówienie 2:<br>";
$cart2->viewProducts();
echo '<br>';

$order2 = $cart2->getProducts();
$prepare = new Prepare($order2);
$status = $prepare->changeStatus();
$status = $prepare->changeStatus();

echo "Przygotowanie: ";
print_r($status);
echo '<br><br>';

$delivery = new Deliver($order2);
$status = $delivery->changeStatus();
echo "Dostawa: ";
print_r($status);