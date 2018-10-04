<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 4/10/18
 * Time: 9:28
 */

namespace App\Chapter04;


use App\Chapter03\LinkedList;
use OverflowException;
use UnderflowException;

class DoubleEndedQueue
{

    private $limit;
    private $queue;

    /**
     * DoubleEndedQueue constructor.
     * @param $limit
     */
    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList();
    }

    /**
     * Removes an element from the queue from the front.
     * @return string|mixed
     */
    public function dequeueFromFront() : string
    {
        if ($this->isEmpty()){
            throw new UnderflowException("Queue is empty");
        } else {
            $lastItem = $this->peekFront();
            $this->queue->deleteFirst();
            return $lastItem;
        }
    }

    /**
     * Removes an element from the queue from the back.
     * @return string
     */
    public function dequeueFromBack() : string
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Queue is empty");
        } else {
            $lastitem = $this->peekBack();
            $this->queue->deleteLast();
            return $lastitem;
        }
    }

    /**
     * Add an item at the front end of the queue.
     * @param string $item
     */
    public function enqueueAtFront(string $item)
    {
        if ($this->queue->getSize() < $this->limit){
            $this->queue->insertAtFirst($item);
        } else {
            throw new OverflowException("Queue is full");
        }
    }

    /**
     * Add an item at the backk end of the queue.
     * @param string $item
     */
    public function enqueueAtBack(string $item)
    {
        if ($this->queue->getSize() < $this->limit){
            $this->queue->insert($item);
        } else {
            throw new OverflowException("Queue is full");
        }
    }

    /**
     * Check whether the queue is empty.
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->queue->getSize() == 0;
    }

    /**
     * Returns the first item from the queue, counting from the front.
     * @return string
     */
    public function peekFront() : string
    {
        return $this->queue->getItemByPosition(1)->data;
    }

    /**
     * Returns the first item from the queue, counting from the back
     * @return string
     */
    public function peekBack() : string
    {
        return $this->queue->getItemByPosition($this->queue->getSize())->data;
    }

}