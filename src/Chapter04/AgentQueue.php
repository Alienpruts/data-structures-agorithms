<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 22:15
 */

namespace App\Chapter04;


use OverflowException;
use UnderflowException;

class AgentQueue implements Queue
{

    private $limit;
    private $queue;

    /**
     * AgentQueue constructor.
     * @param $limit
     */
    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    /**
     * Add an item to the rear of the queue.
     * @param string $item
     * @return mixed
     */
    public function enqueue(string $item)
    {
        if (count($this->queue) < $this->limit){
            array_push($this->queue, $item);
        } else {
            throw new OverflowException("Queue is full");
        }
    }

    /**
     * Remove an item from the front of the queue.
     * @return string
     */
    public function dequeue() : string
    {
        if ($this->isEmpty()){
            throw new UnderflowException("Queue is empty");
        } else {
            return array_shift($this->queue);
        }
    }

    /**
     * Returns the front item of the queue, without removing it.
     * @return string
     */
    public function peek(): string
    {
        return current($this->queue);
    }

    /**
     * Check whether the queue is empty.
     * @return bool
     */
    public function isEmpty() : bool
    {
        return empty($this->queue);
    }
}