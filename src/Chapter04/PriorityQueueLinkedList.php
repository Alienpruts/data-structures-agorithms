<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 23:13
 */

namespace App\Chapter04;


use App\Chapter03\LinkedList;

class PriorityQueueLinkedList extends LinkedList
{
    public function insert(string $data = null, int $priority = NULL)
    {
        $newNode = new PriorityQueueListNode($data, $priority);
        $this->_totalNodes++;

        // List is empty - newly added node is the first.
        if ($this->_firstNode === NULL){
            $this->_firstNode = $newNode;
        } else {
            $previous = $this->_firstNode;
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL){
                // List is not emptu, but new item has highest priority
                if ($currentNode->priority < $priority){
                    if ($currentNode == $this->_firstNode){
                        $previous = $this->_firstNode;
                        $this->_firstNode = $newNode;
                        $newNode->next = $previous;
                        return;
                    }

                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    return;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    return true;
    }


}