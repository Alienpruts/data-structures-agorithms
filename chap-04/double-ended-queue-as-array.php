<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 4/10/18
 * Time: 9:43
 */

use App\Chapter04\DoubleEndedQueue;

require_once __DIR__ . '/../vendor/autoload.php';

try{
    $agents = new DoubleEndedQueue(10);
    $agents->enqueueAtFront("Fred");
    $agents->enqueueAtFront("John");
    $agents->enqueueAtBack("Keith");
    $agents->enqueueAtBack("Aidan");
    $agents->enqueueAtFront("Michael");

    echo $agents->dequeueFromBack() . PHP_EOL;
    echo $agents->dequeueFromFront() . PHP_EOL;
    echo $agents->peekFront() . PHP_EOL;
} catch (Exception $e){
    echo $e->getMessage();
}