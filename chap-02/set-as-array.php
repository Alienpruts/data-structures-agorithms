<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 14:47
 */

// A set is simply a collection of values without any order.

$odd = [];
$odd[] = 1;
$odd[] = 3;
$odd[] = 5;
$odd[] = 7;
$odd[] = 9;

$prime = [];
$prime[] = 2;
$prime[] = 3;
$prime[] = 5;

// Since these are normal arrays, you can search and perform operations on sets

echo in_array(2, $prime);
$union = array_merge($prime, $odd);
$intersect = array_intersect($prime, $odd);
$compliment = array_diff($prime, $odd);

// However, since sets are not ordered searching can be extensive in time, especially in larger sets.
// We can overcome this by using keys to define our sets, since kays are faster to search than values.

$odd = [];
$odd[1] = true;
$odd[3] = true;
$odd[5] = true;
$odd[7] = true;
$odd[9] = true;

$prime = [];
$prime[2] = true;
$prime[3] = true;
$prime[5] = true;

// Now we use different methods of searching only keys
echo isset($prime[2]);
$union = $prime + $odd ;
$intersect = array_intersect_key($prime, $odd);
$compliment = array_diff_key($prime, $odd);