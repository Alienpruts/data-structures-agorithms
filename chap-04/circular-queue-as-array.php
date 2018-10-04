<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 4/10/18
 * Time: 9:24
 */

use App\Chapter04\CircularQueue;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $agents = new CircularQueue(10);

    $agents->enqueue("Fred");
    $agents->enqueue("John");
    $agents->enqueue("Keith");
    $agents->enqueue("Adiyan");
    $agents->enqueue("Michael");


    echo $agents->dequeue() . PHP_EOL;
    echo $agents->dequeue() . PHP_EOL;


} catch (Exception $e){
    echo $e->getMessage();
}