<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 16:40
 */

// SPL implementation of the Stack uses the concept of Doubly Linked Lists.

$books = new SplStack();

$books->push("Introduction to PHP7");
$books->push("Mastering Javascript");
$books->push("MySQL Workbench tutorial");

echo $books->pop() . PHP_EOL;
echo $books->top() . PHP_EOL;