<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 11:03
 */

// Simple associative array

$student = [];
$student['Name'] = "Bert";
$student['Age'] = "37";
$student['Class'] = "6";
$student['RollNumber'] = "71";
$student['Contact'] = "info@example.net";

foreach ($student as $index => $item) {
    echo $index . ": " . $item . PHP_EOL;
}

