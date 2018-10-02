<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 13:43
 */

/**
 * See p 34 for Graph.
 * A connected to B and C
 * B connected to A, D and E
 * C connected to A
 * D connected to B
 * E connected to A and B
 */

// Putting graph in a normal array would strip it of connectivity

$nodes = [ 'A', 'B', 'C', 'D', 'E'];

// We need multidimensional arrays to display connectivity
// We can do this because there is no 'direction' in connectivity, ie. A - B = B - A

echo "BEFORE : " . PHP_EOL;
echo "********************************" . PHP_EOL;

$graph = [];


foreach ($nodes as $xNode) {
    foreach ($nodes as $yNode){
        $graph[$xNode][$yNode] = 0;
        echo $graph[$xNode][$yNode] . "\t";
    }
    echo PHP_EOL;
}


// The graph is empty (all 0) - no relationship
// Now we define relationships using binary 1

echo "AFTER : " . PHP_EOL;
echo "********************************" . PHP_EOL;

$graph["B"]["A"] = 1 ;
$graph["A"]["B"] = 1 ;
$graph["A"]["C"] = 1 ;
$graph["C"]["A"] = 1 ;
$graph["A"]["E"] = 1 ;
$graph["E"]["A"] = 1 ;
$graph["B"]["E"] = 1 ;
$graph["E"]["B"] = 1 ;
$graph["B"]["D"] = 1 ;
$graph["D"]["B"] = 1 ;


foreach ($nodes as $xNode) {
    foreach ($nodes as $yNode){
        echo $graph[$xNode][$yNode] . "\t";
    }
    echo PHP_EOL;
}

