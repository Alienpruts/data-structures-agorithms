<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 13:55
 */

// Using fixed size arrays does have the advantage of better memory management, for starters.

$array = new SplFixedArray(10);

for ($i = 0; $i < 10; $i++) {
    $array[$i] = $i;
}

var_dump($array);


// Testing performance gains using SPL

$startMemory = memory_get_usage();
$array = range(1,100000);
$endMemory = memory_get_usage();

echo ($endMemory - $startMemory) / (1024*1024) . " megabytes mem usage with a standard array" . PHP_EOL;

$items = 100000;
$startMemory = memory_get_usage();
$array = new SplFixedArray($items);
for ($i = 1; $i < $items; $i++) {
    $array[$i] = $i;
}
$endMemory = memory_get_usage();

echo abs($endMemory - $startMemory) / (1024*1024) . " megabytes mem usage with a splFixedarray" . PHP_EOL;


// Note that you cannot use standard array functions on SplFixedArrays. This is because it is no longer an array, but an object.
//array_sum($array);

// You can change from array to SplFixedArray during runtime
$array = [
    1 => 10,
    2 => 100,
    3 => 1000,
    4 => 10000,
];

// Without supplied options, this will simply put NULL in 'empty' indexes (like 0 in our example)
$splArray = SplFixedArray::fromArray($array);
var_dump($splArray);

// You can remove them using options
$splArray = SplFixedArray::fromArray($array, false);
var_dump($splArray);

// To really save memory, do not forget to unset the source array
unset($array);

// We can also do the reverse - convert a SplFixedArray to a normal array
$array = $splArray->toArray();
var_dump($array);
unset($splArray);

// We can change the size of SplFixedArray during runtime
$items = 5;
$array = new SplFixedArray($items);
for ($i = 0; $i < $items; $i++) {
    $array[$i] = $i * 10;
}

$array->setSize(10);
$array[7] = 100;

var_dump($array);


// We can also create multidimensional arrays using SplFixedArray.
// Do keep in mind that multiple dimensions tend to grow the array exponentially!
$array = new SplFixedArray(100);

for ($i = 0; $i < 100; $i++) {
    $array[$i] = new SplFixedArray(100);
}

// This will output quite a lot!
//var_dump($array);

