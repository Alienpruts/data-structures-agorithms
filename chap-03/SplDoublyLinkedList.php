<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 13:53
 */

$bookTitles = new SplDoublyLinkedList();

$bookTitles->push("Introduction to Algorithms");
$bookTitles->push("Introduction to PHP and Data Structures");
$bookTitles->push("Programming Intelligence");

$bookTitles->add(1, "Introduction to Calculus");
$bookTitles->add(3, "Introduction to Graph Theory");

for ($bookTitles->rewind(); $bookTitles->valid(); $bookTitles->next()){
    echo $bookTitles->current() . PHP_EOL;
}
