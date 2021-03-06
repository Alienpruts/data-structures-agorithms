<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 16:34
 */

use App\Chapter04\BookList;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $programmingBooks = new BookList();
    $programmingBooks->push("Introduction to PHP7");
    $programmingBooks->push("Mastering Javascript");
    $programmingBooks->push("MySQL Workbench tutorial");

    echo $programmingBooks->pop() . PHP_EOL;
    echo $programmingBooks->pop() . PHP_EOL;
    echo $programmingBooks->top() . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage();
}
