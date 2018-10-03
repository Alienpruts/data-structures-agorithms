<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 9:23
 */

namespace App\Chapter03;


class CircularLinkedList
{
    private $_firstNode = NULL;
    private $_totalNodes = 0;

    /**
     * Insert new node at end of circular linked list.
     * We must take care to set the next propery of the inserted node to the first node of the list.
     * @param string|null $data
     * @return bool
     */
    public function insertAtEnd(string $data = NULL)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === NULL){
            $this->_firstNode = &$newNode;
        } else {
            $currenNode = $this->_firstNode;
            while ($currenNode->next !== $this->_firstNode){
                $currenNode = $currenNode->next;
            }
            $currenNode->next = $newNode;
        }
        $newNode->next = $this->_firstNode;
        $this->_totalNodes++;
        return true;
    }

    /**
     * Display function for a circular linked list.
     * We cannot use the same method of a normal linked list : we need to take care not to fall into an infinite loop
     * because of the next property of the last node.
     */
    public function display()
    {
        echo "Total book titles: " .$this->_totalNodes . PHP_EOL;
        $currentNode = $this->_firstNode;
        while ($currentNode->next !== $this->_firstNode){
            echo $currentNode->data . PHP_EOL;
        }

        if ($currentNode){
            echo $currentNode->data . PHP_EOL;
        }
    }

}