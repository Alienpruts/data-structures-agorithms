<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 6/10/18
 * Time: 15:13
 */

use App\Chapter06\BinaryTree;

require_once __DIR__ . "/../vendor/autoload.php";

$nodes  = [];
$nodes[] = "Final";
$nodes[] = "Semi Final 1";
$nodes[] = "Semi Final 2";
$nodes[] = "Quarter Final 1";
$nodes[] = "Quarter Final 2";
$nodes[] = "Quarter Final 3";
$nodes[] = "Quarter Final 4";

$tree = new BinaryTree($nodes);
$tree->traverse(0);