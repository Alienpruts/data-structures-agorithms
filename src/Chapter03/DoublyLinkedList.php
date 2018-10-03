<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 9:46
 */

namespace App\Chapter03;


class DoublyLinkedList
{
    private $_firstNode = NULL;
    private $_lastNode = NULL;
    private $_totalNodes = 0;


    /**
     * Inserts a new node at the first position of the doubly linked list.
     * We must check whether the list is empty (new node is both first and last) or not (mark new node as
     * beeing the first and assign previous first node as new node's next AND previous first node's previous to new node)
     * @param string|NULL $data
     * @return bool
     */
    public function insertAtFirst(string $data = NULL)
    {
        $newNode = new DoublyListNode($data);

        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
            $this->_lastNode = $newNode;
        } else {
            $currentFirstNode = $this->_firstNode;
            $this->_firstNode = &$newNode;
            $newNode->next = $currentFirstNode;
            $currentFirstNode->prev = $newNode;
        }
        $this->_totalNodes++;
        return true;
    }

    /**
     * Inserts a new node at the last position of the doubly linked list.
     * We must check whether the list is empty (new node is both first and last) or not (mark new node as beeing the last
     * and set the previous and next properties accordingly.
     * @param string|NULL $data
     * @return bool
     */
    public function insertAtLast(string $data = NULL)
    {
        $newNode = new DoublyListNode($data);

        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
            $this->_lastNode = $newNode;
        } else {
            $currentNode = $this->_lastNode;
            $currentNode->next = $newNode;
            $newNode->prev = $currentNode;
            $this->_lastNode = $newNode;
        }
        $this->_totalNodes++;
        return true;
    }

    /**
     * Inserts a new node before a specific node.
     * We need to find the node and based on its position, change the next and previous properties of the new node,
     * target node and the node before the target node.
     * @param string|NULL $data
     * @param string|NULL $query
     */
    public function insertBefore(string $data = NULL, string $query = NULL)
    {
        $newNode = new DoublyListNode($data);
        if ($this->_firstNode) {
            $previous = NULL;
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $currentNode->prev = $newNode;
                    $previous->next = $newNode;
                    $newNode->prev = $previous;
                    $this->_totalNodes++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    /**
     * Inserts a new node after a specific node.
     * We need to find the node and based on its position, change the next and prev properties of the new node, target
     * node and the node after the target node.
     * @param string|NULL $data
     * @param string|NULL $query
     */
    public function insertAfter(string $data = NULL, string $query = NULL)
    {
        $newNode = new DoublyListNode($data);
        if ($this->_firstNode) {
            $nextNode = NULL;
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {

                    // Check if there is a node AFTER the found node
                    if ($nextNode !== NULL) {
                        $newNode->next = $nextNode;
                    }
                    // check if the found node is the last node.
                    if ($currentNode === $this->_lastNode) {
                        $this->_lastNode = $newNode;
                    }

                    $currentNode->next = $newNode;
                    $nextNode->prev = $newNode;
                    $newNode->prev = $currentNode;

                    $this->_totalNodes++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode;
            }
        }
    }

    /**
     * Deletes the first node of the list.
     * We need to make the second node the first node after removing the item.
     * @return bool
     */
    public function deleteFirst()
    {
        if ($this->_firstNode !== NULL) {
            // Check if this is the only item in the list and act accordingly.
            if ($this->_firstNode->next !== NULL) {
                $this->_firstNode = $this->_firstNode->next;
                $this->_firstNode->prev = NULL;
            } else {
                $this->_firstNode = NULL;
            }
            $this->_totalNodes--;
            return true;
        }
        return false;
    }

    /**
     * Deletes the last node of the list.
     * We need to make the second to last node the last node after removing the item.
     * @return bool
     */
    public function deleteLast()
    {
        if ($this->_lastNode !== NULL) {
            $currentNode = $this->_lastNode;
            // Check if this is the only item, delete first and last if so.
            if ($currentNode->prev === NULL) {
                $this->_firstNode = NULL;
                $this->_lastNode = NULL;
            } else {
                $previousNode = $currentNode->prev;
                $this->_lastNode = $previousNode;
                $previousNode->next = NULL;
                $this->_totalNodes--;
                return true;
            }
        }
        return false;
    }

    /**
     * Deletes a given node from the list.
     * We need to make sure that always the previous and next nodes of the found node are tracked, and the next and prev
     * properties of both are set.
     * @param string|NULL $query
     */
    public function delete(string $query = NULL)
    {
        if ($this->_firstNode) {
            $previous = NULL;
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    // Check if the found node is tha last one in the list.
                    if ($currentNode->next === NULL) {
                        $previous->next = NULL;
                    } else {
                        $previous->next = $currentNode->next;
                        $currentNode->next->prev = $previous;
                    }

                    $this->_totalNodes--;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    /**
     * Displays the items in the list moving forward.
     * Starts from the first item.
     */
    public function displayForward()
    {
        echo "Total book titles: " . $this->_totalNodes . PHP_EOL;
        $currentNode = $this->_firstNode;
        while ($currentNode !== NULL){
            echo $currentNode->data . PHP_EOL;
            $currentNode = $currentNode->next;
        }
    }

    /**
     * Displays the items in the list moving backward.
     * Starts from the last item.
     */
    public function displayBackward()
    {
        echo "Total book titles: " . $this->_totalNodes . PHP_EOL;
        $currentNode = $this->_lastNode;
        while ($currentNode !== NULL){
            echo $currentNode->data . PHP_EOL;
            $currentNode = $currentNode->prev;
        }
    }
}