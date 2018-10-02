<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 15:37
 */

use App\Chapter03\LinkedList;

require_once __DIR__ . '/../vendor/autoload.php';

define("SEPERATOR", PHP_EOL . "**********************************" . PHP_EOL);

$bookTitles = new LinkedList();

// Insert three books
$bookTitles->insert("Introduction to Algorithms");
$bookTitles->insert("Introduction to PHP Data Structures");
$bookTitles->insert("Programming Intelligence");

// Display data
$bookTitles->display();
echo SEPERATOR;

// Insert a new book as the first element of the list.
$bookTitles->insertAtFirst("Introducing PHP to noobs");

$bookTitles->display();

// Search for a existing title, and a non-existing title.
var_dump($bookTitles->search("Introducing PHP to noobs")->data);
var_dump($bookTitles->search("Clever stuff"));
echo SEPERATOR;

// Insert a title before another title
$bookTitles->insertBefore("Handsome developers", "Programming Intelligence");

$bookTitles->display();
echo SEPERATOR;

// Insert a title after another title
$bookTitles->insertAfter("The complex anatomy of a developer", "Introduction to Algorithms");

$bookTitles->display();
echo SEPERATOR;

// Delete the first entry in the list
$bookTitles->deleteFirst();

$bookTitles->display();
echo SEPERATOR;
