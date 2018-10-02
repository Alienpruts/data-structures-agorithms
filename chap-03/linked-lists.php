<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 15:37
 */

use App\Chapter03\LinkedList;

require_once __DIR__ . '/../vendor/autoload.php';

$bookTitles = new LinkedList();

// Insert three books
$bookTitles->insert("Introduction to Algortihms");
$bookTitles->insert("Introduction to PHP Data Structures");
$bookTitles->insert("Programming Intelligence");

// Display data
$bookTitles->display();

// Insert a new book as the first element of the list.
$bookTitles->insertAtFirst("Introducing PHP to noobs");

$bookTitles->display();

// Search for a existing title, and a non-existing title.
var_dump($bookTitles->search("Introducing PHP to noobs")->data);
var_dump($bookTitles->search("Clever stuff"));

// Insert a title befor another title
$bookTitles->insertBefore("Handsome developers", "Programming Intelligence");

$bookTitles->display();