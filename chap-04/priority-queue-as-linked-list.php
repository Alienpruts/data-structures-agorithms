<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 23:33
 */

use App\Chapter04\AgentPriorityQueueList;

require_once __DIR__ . "/../vendor/autoload.php";

try {
    $agents = new AgentPriorityQueueList(10);

    $agents->enqueueWithPriority("Fred", 1);
    $agents->enqueueWithPriority("John", 2);
    $agents->enqueueWithPriority("Keith", 3);
    $agents->enqueueWithPriority("Adiyan", 4);
    $agents->enqueueWithPriority("Michael", 2);

    $agents->display();

    echo $agents->dequeue() . PHP_EOL;
    echo $agents->dequeue() . PHP_EOL;


} catch (Exception $e){
    echo $e->getMessage();
}