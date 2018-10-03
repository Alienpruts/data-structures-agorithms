<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 15:37
 */

use App\Chapter03\LinkedList;

require_once __DIR__ . '/../vendor/autoload.php';

define("SEPARATOR", PHP_EOL . "**********************************" . PHP_EOL);

$bookTitles = new LinkedList();

// Insert three books
$bookTitles->insert("Introduction to Algorithms");
$bookTitles->insert("Introduction to PHP Data Structures");
$bookTitles->insert("Programming Intelligence");

// Display data
$bookTitles->display();
echo SEPARATOR;

// Insert a new book as the first element of the list.
$bookTitles->insertAtFirst("Introducing PHP to noobs");

$bookTitles->display();

// Search for a existing title, and a non-existing title.
var_dump($bookTitles->search("Introducing PHP to noobs")->data);
var_dump($bookTitles->search("Clever stuff"));
echo SEPARATOR;

// Insert a title before another title
$bookTitles->insertBefore("Handsome developers", "Programming Intelligence");

$bookTitles->display();
echo SEPARATOR;

// Insert a title after another title
$bookTitles->insertAfter("The complex anatomy of a developer", "Introduction to Algorithms");

$bookTitles->display();
echo SEPARATOR;

// Delete the first entry in the list
var_dump($bookTitles->deleteFirst());

$bookTitles->display();
echo SEPARATOR;

// Delete the last entry in the list
var_dump($bookTitles->deleteLast());

$bookTitles->display();
echo SEPARATOR;

// Search and delete a entry from the list.
$bookTitles->delete("Introduction to PHP Data Structures");

$bookTitles->display();
echo SEPARATOR;

// Reverse the list
$bookTitles->reverse();

$bookTitles->display();
echo SEPARATOR;

// Retrieve the 2nd item from the list
echo $bookTitles->getItemByPosition(2)->data;
echo SEPARATOR;

// We've made the list Iterable, reverse list again and loop through it.
$bookTitles->reverse();
foreach ($bookTitles as $title){
    echo $title . PHP_EOL;
}

