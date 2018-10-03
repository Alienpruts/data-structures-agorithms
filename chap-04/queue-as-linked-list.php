<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 22:33
 */

use App\Chapter04\AgentQueueList;

require_once __DIR__ . "/../vendor/autoload.php";

try{
    $agents = new AgentQueueList(10);
    $agents->enqueue("Fred");
    $agents->enqueue("John");
    $agents->enqueue("Keith");
    $agents->enqueue("Adiyan");
    $agents->enqueue("Michael");

    echo $agents->dequeue() . PHP_EOL;
    echo $agents->dequeue() . PHP_EOL;
    echo $agents->peek() . PHP_EOL;

} catch (Exception $e){
    echo $e->getMessage();
}