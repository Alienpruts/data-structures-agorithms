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