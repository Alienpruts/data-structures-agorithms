<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 4/10/18
 * Time: 14:14
 */

/**
 * Recursion is a way to solve larger problems by dividing them into smaller problems. Recursive functions MUST call
 * themselves to break down the problems. For example :
 *
 * Mathematical factorials :
 *
 *  5! = 5 * 4 * 3 * 2 * 1
 *  4! = 4 * 3 * 2 * 1
 *  3! = 3 * 2 * 1
 *  2! = 2 * 1
 *  1! = 1
 *
 * The above can be rewritten :
 *
 *  5! = 5 * 4!
 *  4! = 4 * 3!
 *  3! = 3 * 2!
 *  2! = 2 * 1!
 *  1! = 5 * 0!
 *  0! = 1
 *
 * Mathematically this boils down do :
 *
 *  n! = n * (n-1)!
 *
 * Functionally it goes like this for 3! = 3 * 2! :
 *
 *  Step 1 : 3! = 3 * 2!
 *  Step 2 : 2! = 2 * 1!
 *  Step 3 : 1! = 1 * 0!
 *  Step 4 : 0! = 1             <== This is the actual end of recursion, where we start to get results in.
 *  Step 5 : 1! = 1 * 1 = 1
 *  Step 6 : 2! = 2 * 1 = 2
 *  Step 7 : 3! = 3 * 2 = 6
 *
 * Recursive functions have these three properties which should be met :
 *
 *  1) Should be called on a smaller subproblem of the larger problem
 *  2) Should have a base case which ends the recursion.
 *  3) Should not be any cycle : should not make a recursive call to the same problem (endless loop)
 *
 */


$n = 10;
$x = 110;

echo "The factor of {$n} is : " .factorial($n) . PHP_EOL;

echo "The Fibonacci number of {$n} is : " . fibonnacci($n) . PHP_EOL;

echo "The Greatest Common Division of {$n} and {$x} is : " . gcd($n, $x) . PHP_EOL ;

echo "Be sure to check the docblock of this file for more explanation!" . PHP_EOL;


function factorial(int $n) : int
{

    // This is the base case which ends recursion.
    if ($n == 0){
        return 1;
    }

    // This is the recursive call. Notice how we lower n to eventually reach the base case.
    return $n * factorial($n - 1);
}

function fibonnacci(int $n) : int
{
    if ($n == 0){
        return 1;
    } else if ($n == 1) {
        return 1;
    } else {
        return fibonnacci($n - 1) + fibonnacci($n - 2);
    }
}

function gcd(int $a, int $b) : int
{
    if ($b == 0) {
        return $a;
    } else {
        return gcd($b, $a % $b);
    }
}

