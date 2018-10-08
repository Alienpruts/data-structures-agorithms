<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 8/10/18
 * Time: 20:23
 */

use App\Chapter06\BST;

require_once __DIR__ . "/../vendor/autoload.php";

$tree = new BST(10);

$tree->insert(12);
$tree->insert(6);
$tree->insert(3);
$tree->insert(8);
$tree->insert(15);
$tree->insert(13);
$tree->insert(36);

$tree->remove(15);

$tree->traverse($tree->root);

// Use the search functionality.
echo $tree->search(14) ? "Found" : "Not Found";
echo PHP_EOL;
echo $tree->search(36) ? "Found" : "Not Found";
echo PHP_EOL;
