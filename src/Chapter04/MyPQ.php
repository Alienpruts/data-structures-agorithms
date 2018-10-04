<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 4/10/18
 * Time: 8:00
 */

namespace App\Chapter04;


use SplPriorityQueue;

class MyPQ extends SplPriorityQueue
{

    public function compare($priority1, $priority2 ) : bool
    {
        return $priority1 <=> $priority2;
    }
}