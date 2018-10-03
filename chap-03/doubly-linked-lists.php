<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 15:37
 */


use App\Chapter03\DoublyLinkedList;

require_once __DIR__ . '/../vendor/autoload.php';

define("SEPARATOR", PHP_EOL . "**********************************" . PHP_EOL);

$bookTitles = new DoublyLinkedList();

// Insert three books
$bookTitles->insertAtFirst("Introduction to Algorithms");
$bookTitles->insertAfter("Programming Intelligence", "Introduction to Algorithms");
$bookTitles->insertAtLast("Handsome developers");
$bookTitles->insertBefore("Student yearbook", "Programming Intelligence");

// Display data
$bookTitles->displayForward();
echo SEPARATOR;

// Display data backwards
$bookTitles->displayBackward();
echo SEPARATOR;