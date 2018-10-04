<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 23:26
 */

namespace App\Chapter04;


use OverflowException;

class AgentPriorityQueueList extends AgentQueueList
{
    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new PriorityQueueLinkedList();
    }

    public function enqueueWithPriority(string $item, int $priority)
    {
        if ($this->queue->getSize() < $this->limit){
            $this->queue->insert($item, $priority);
        } else {
            throw new OverflowException("Queue is full");
        }
    }

    public function display()
    {
        // TODO : this will show the 'Total books line', because of the implementation of display in LinkedList!
        // This is in fact a weak way of using display method, but so be it!
        $this->queue->display();
    }


}