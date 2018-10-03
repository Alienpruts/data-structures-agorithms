<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 22:12
 */

namespace App\Chapter04;


interface Queue
{
    /**
     * Add an item to the rear of the queue.
     * @param string $item
     * @return mixed
     */
    public function enqueue(string $item);

    /**
     * Remove an item from the front of the queue.
     * @return mixed
     */
    public function dequeue();

    /**
     * Returns the front item of the queue, without removing it.
     * @return mixed
     */
    public function peek();

    /**
     * Check whether the queue is empty.
     * @return mixed
     */
    public function isEmpty();

}