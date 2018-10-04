<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 4/10/18
 * Time: 9:09
 */

namespace App\Chapter04;


use OverflowException;
use UnderflowException;

class CircularQueue implements Queue
{

    private $queue;
    private $limit;
    private $front = 0;
    private $rear = 0;

    /**
     * CircularQueue constructor.
     * @param $limit
     */
    public function __construct(int $limit = 5)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    /**
     * Returns the size of the Circular queue.
     * This is calculated by either substracting the front position from the rear position or by substracting the sum
     * of the front and rear positions from the total limit.
     * @return int
     */
    public function size()
    {
        if ($this->rear > $this->front){
            return $this->rear - $this->front;
        }

        return $this->limit - $this->front + $this->rear;
    }

    /**
     * Add an item to the rear of the queue.
     * @param string $item
     * @return mixed
     */
    public function enqueue(string $item)
    {
        if ($this->isFull()){
            throw new OverflowException("Queue is full.");
        } else {
            $this->queue[$this->rear] = $item;
            // get the last position by using a rest division by the total limit.
            $this->rear = ($this->rear + 1) % $this->limit;
        }
    }

    /**
     * Remove an item from the front of the queue.
     * @return mixed|string
     */
    public function dequeue()
    {
        $item = "";
        if ($this->isEmpty()){
            throw new UnderflowException("Queue is empty");
        } else {
            $item = $this->queue[$this->front];
            $this->queue[$this->front] = NULL;
            $this->front = ($this->front + 1) % $this->limit;
        }

        return $item;
    }

    /**
     * Returns the front item of the queue, without removing it.
     * @return string
     */
    public function peek() : string
    {
        return $this->queue[$this->front];
    }

    /**
     * Check whether the queue is empty.
     * @return bool
     */
    public function isEmpty() : bool
    {
        return $this->front == $this->rear;
    }

    /**
     * Check whether the queue is full.
     * @return bool
     */
    public function isFull() : bool
    {
        $diff = $this->rear - $this->front;
        if ($diff == -1 || $diff == ($this->limit - 1)){
            return true;
        }

        return false;
    }
}