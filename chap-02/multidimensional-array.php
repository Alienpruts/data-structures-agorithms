<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 11:06
 */

// Simple Two dimensional array. Note the use of tho foreach loops to

$players = [];
$players[] = ["Name" => "Ronaldo", "Age" => 31, "Country" => "Portugal", "Team" => "Real Madrid"];
$players[] = ["Name" => "Messi", "Age" => 27, "Country" => "Argentina", "Team" => "Barcelona"];
$players[] = ["Name" => "Neymar", "Age" => 24, "Country" => "Brazil", "Team" => "Barcelona"];
$players[] = ["Name" => "Rooney", "Age" => 30, "Country" => "England", "Team" => "Man United"];

foreach( $players as $index => $playerInfo) {
    echo "Info of player # " . ($index + 1). PHP_EOL;

    foreach( $playerInfo as $key => $value) {
        echo $key . ": " . $value . PHP_EOL;
    }
    echo PHP_EOL;
}