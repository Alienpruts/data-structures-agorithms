<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 22:27
 */

namespace App\Chapter04;


use App\Chapter03\LinkedList;
use OverflowException;
use UnderflowException;

class AgentQueueList implements Queue
{
    private $limit;
    private $queue;

    /**
     * AgentQueueList constructor.
     * @param $limit
     */
    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList();
    }

    /**
     * Add an item to the rear of the queue.
     * @param string $item
     * @return mixed
     */
    public function enqueue(string $item)
    {
        if ($this->queue->getSize() < $this->limit){
            $this->queue->insert($item);
        } else {
            throw new OverflowException("Queue is full");
        }
    }

    /**
     * Remove an item from the front of the queue.
     * @return mixed
     */
    public function dequeue() : string
    {
        if ($this->isEmpty()){
            throw new UnderflowException("Queue is empty");
        } else {
            $lastItem = $this->peek();
            $this->queue->deleteFirst();
            return $lastItem;
        }
    }

    /**
     * Returns the front item of the queue, without removing it.
     * @return mixed
     */
    public function peek() : string
    {
        return $this->queue->getItemByPosition(1)->data;
    }

    /**
     * Check whether the queue is empty.
     * @return mixed
     */
    public function isEmpty() : bool
    {
        return $this->queue->getSize() == 0;
    }
}