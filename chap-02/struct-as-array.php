<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 14:41
 */

// Struct is a complex data type where multiple properties are defined as a group.

$player = [
    "name" => "Ronaldo",
    "country" => "Portugal",
    "age" => 31,
    "currentTeam" => "Real Madrid"
];

// This is indeed a simple associative array with keys as strings. Complex struct can be accomplished
// by using a single construct as it's properties.

$ronaldo = [
    "name" => "Ronaldo",
    "country" => "Portugal",
    "age" => 31,
    "currentTeam" => "Real Madrid"
];

$messi = [
    "name" => "Messi",
    "country" => "Argentina",
    "age" => 27,
    "currentTeam" => "Barcelona"
];


// Here we have a complex struct using the player struct.
$team = [
    "player1" => $ronaldo,
    "player2" => $messi
];

// This is indeed similar to a PHP class using properties. Objects are inherently slower, but leave a lesser memory
// footprint. We need to choose.


