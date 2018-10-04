<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 4/10/18
 * Time: 15:32
 */

$files = [];

showFiles(".", $files);

foreach ($files as $file){
    echo $file . PHP_EOL;
}

function showFiles(string $dirName, array &$allFiles = []){
    $files = scandir($dirName);

    foreach ($files as $key => $value) {
        $path = realpath($dirName . DIRECTORY_SEPARATOR . $value);
        // If the current path is a directory, call recursively. If not, just add to the result array.
        if (!is_dir($path)){
            $allFiles[] = $path;
        } else if ($value != "." && $value != "..") {
            showFiles($path, $allFiles);
            $allFiles[] = $path;
        }
    }
    return;
}
