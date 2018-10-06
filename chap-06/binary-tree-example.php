<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 6/10/18
 * Time: 15:13
 */

use App\Chapter06\BinaryNode;
use App\Chapter06\BinaryTree;

require_once __DIR__ . "/../vendor/autoload.php";

$final = new BinaryNode("Final");

$tree = new BinaryTree($final);

$semiFinal1 = new BinaryNode("Semi Final 1");
$semiFinal2 = new BinaryNode("Semi Final 2");
$quarterFinal1 = new BinaryNode("Quarter Final 1");
$quarterFinal2 = new BinaryNode("Quarter Final 2");
$quarterFinal3 = new BinaryNode("Quarter Final 3");
$quarterFinal4 = new BinaryNode("Quarter Final 4");

$semiFinal1->addChildren($quarterFinal1,$quarterFinal2);
$semiFinal2->addChildren($quarterFinal3,$quarterFinal4);

$final->addChildren($semiFinal1, $semiFinal2);

$tree->traverse($tree->root);