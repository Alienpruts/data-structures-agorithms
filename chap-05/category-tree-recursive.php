<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 4/10/18
 * Time: 15:17
 */

$array = [
    ["id" => 1, "categoryName" => "First", "parentCategory" => 0, "SortInd" => 0],
    ["id" => 2, "categoryName" => "Second", "parentCategory" => 1, "SortInd" => 0],
    ["id" => 3, "categoryName" => "Third", "parentCategory" => 1, "SortInd" => 1],
    ["id" => 4, "categoryName" => "Fourth", "parentCategory" => 3, "SortInd" => 0],
    ["id" => 5, "categoryName" => "Fifth", "parentCategory" => 4, "SortInd" => 0],
    ["id" => 6, "categoryName" => "Sixth", "parentCategory" => 5, "SortInd" => 0],
    ["id" => 7, "categoryName" => "Seventh", "parentCategory" => 6, "SortInd" => 0],
    ["id" => 8, "categoryName" => "Eight", "parentCategory" => 7, "SortInd" => 0],
    ["id" => 9, "categoryName" => "Ninth", "parentCategory" => 1, "SortInd" => 0],
    ["id" => 10, "categoryName" => "Tenth", "parentCategory" => 2, "SortInd" => 1],
];

foreach ($array as $row){
    $categories[$row["parentCategory"]][] = $row;
}

showCategoryTree($categories, 0);

function showCategoryTree(array $categories, int $n) {
    if (isset($categories[$n])) {
        foreach ($categories[$n] as $category) {
            echo str_repeat("-", $n) . "" . $category["categoryName"] . PHP_EOL;
            showCategoryTree($categories, $category["id"]);
        }
    }
    return;
}