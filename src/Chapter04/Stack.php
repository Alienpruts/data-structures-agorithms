<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 15:57
 */

namespace App\Chapter04;


interface Stack
{
    /**
     * Adds an item to the stack.
     * @param string $item
     * @return mixed
     */
    public function push(string $item);

    /**
     * Removes an item from the stack.
     * @return mixed
     */
    public function pop();

    /**
     * Returns the top element of the stack.
     * @return mixed
     */
    public function top();

    /**
     * Returns whether the stack is empty.
     * @return bool
     */
    public function isEmpty();

}