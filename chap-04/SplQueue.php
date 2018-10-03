<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 22:39
 */

$agents = new SplQueue();

$agents->enqueue("Fred");
$agents->enqueue("John");
$agents->enqueue("Keith");
$agents->enqueue("Adiyan");
$agents->enqueue("Michael");

echo $agents->dequeue() . PHP_EOL;
echo $agents->dequeue() . PHP_EOL;
echo $agents->bottom() . PHP_EOL;