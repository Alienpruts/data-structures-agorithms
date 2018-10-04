<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 4/10/18
 * Time: 8:05
 */

use App\Chapter04\MyPQ;

require_once __DIR__ . '/../vendor/autoload.php';

$agents = new MyPQ();

$agents->insert("Fred", 1);
$agents->insert("John", 2);
$agents->insert("Keith", 3);
$agents->insert("Adiyan", 4);
$agents->insert("Michael", 2);

$agents->extract();
$agents->extract();
// Set mode of extraction
$agents->setExtractFlags(MyPQ::EXTR_BOTH);

// Go to Top
$agents->top();

while ($agents->valid()){
    $current = $agents->current();
    echo $current['data'] . PHP_EOL;
    $agents->next();
}