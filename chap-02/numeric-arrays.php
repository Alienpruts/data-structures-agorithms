<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 10:56
 */


// Simple numeric array wiith sequential indexes
$array = [10, 20, 30, 40, 50];
$array[] = 70;
$array[] = 80;

$arraySize = count($array);

for ($i = 0; $i < $arraySize; $i++) {
    echo "Position {$i} holds data : {$array[$i]}" .PHP_EOL;
}

echo PHP_EOL . "*****************************" . PHP_EOL;
// If indexes are not sequential, is it possible to iterate over them?
// Sure, the method of iteration will need to be adjusted

$array = [];
$array[10] = 100;
$array[21] = 200;
$array[29] = 300;
$array[500] = 1000;
$array[1001] = 10000;
$array[71] = 1971;

foreach ($array as $index => $item) {
    echo "Position {$index} holds data : {$item}" . PHP_EOL;
}