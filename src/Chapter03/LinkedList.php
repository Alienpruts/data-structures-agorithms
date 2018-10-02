<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 15:26
 */

namespace App\Chapter03;


class LinkedList
{
    private $_firstNode = NULL;
    private $_totalNodes = 0;

    public function insert(string $data = NULL)
    {
        $newNode = new ListNode($data);

        // We should keep track whether the list is empty (current item is the first), or is not empty (current item needs
        // to be added on the end of the list.
        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
        } else {
            $currentNode = $this->_firstNode;
            // Iterating the list to get to the end.
            while ($currentNode->next !== NULL) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }
        $this->_totalNodes++;
        return true;
    }

    public function display()
    {
        echo "Total book titles: " . $this->_totalNodes . PHP_EOL;

        $currentNode = $this->_firstNode;

        while ($currentNode !== NULL) {
            echo $currentNode->data . PHP_EOL;
            $currentNode = $currentNode->next;
        }
    }

    /**
     * Inserts a node as the first node in the linked list.
     * We need to take care to set the previous first node as the next value of the inserted node.
     * @param string|null $data
     * @return bool
     */
    public function insertAtFirst(string $data = NULL)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
        } else {
            $currentFirstNode = $this->_firstNode;
            $this->_firstNode = &$newNode;
            $newNode->next = $currentFirstNode;
        }
        $this->_totalNodes++;
        return true;
    }

    /**
     * Search for a node in the linked list.
     * We need to check if there are any nodes to begin with, and iterate through the list until found.
     * @param string|null $data
     * @return bool|ListNode
     */
    public function search(string $data = NULL)
    {
        if ($this->_totalNodes) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $data){
                    return $currentNode;
                }
                $currentNode = $currentNode->next;
            }
        }
        return false;
    }

    /**
     * Inserts a new node before an existing node.
     * Care must be taken to set the next values of the node before and the searched node itself to match the inserted node
     * @param string|null $data
     * @param string|null $query
     */
    public function insertBefore(string $data = NULL, string $query = NULL)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode) {
            $previous = NULL;
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    $this->_totalNodes++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    /**
     * Inserts a new node before an existing node.
     * Care must be taken to set the next values of the node after and the searched node itself
     * @param string|null $data
     * @param string|null $query
     */
    public function insertAfter(string $data = NULL, string $query = NULL)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode) {
            $nextNode = NULL;
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    if ($nextNode !== NULL) {
                        $newNode->next = $nextNode;
                    }
                    $currentNode->next = $newNode;
                    $this->_totalNodes++;
                    break;
                }
                $currentNode = $currentNode->next;
                // We can only set the next Node if a value exists for next in the current node.
                if (isset($currentNode->next)) {
                    $nextNode = $currentNode->next;
                }
            }
        }
    }

    /**
     * Deletes the first node of the nodelist, if applicable.
     * We need to make the second node the first node after removal.
     * @return bool
     */
    public function deleteFirst() {
        if ($this->_firstNode !== NULL) {
            if ($this->_firstNode->next !== NULL) {
                $this->_firstNode = $this->_firstNode->next;
            } else {
                $this->_firstNode = NULL;
            }
            $this->_totalNodes--;
            return true;
        }
        return false;
    }

    /**
     * Deletes the last node of the nodelist, if applicable.
     * We need to make sure the next property of the second last is set to NULL.
     * @return bool
     */
    public function deleteLast()
    {
        if ($this->_firstNode !== NULL){
            $currentNode = $this->_firstNode;
            if ($currentNode->next === NULL){
                $this->_firstNode = NULL;
            } else {
                $previousNode = NULL;

                while ($currentNode->next !== NULL) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }
                $previousNode->next = NULL;
                $this->_totalNodes--;
                return true;
            }
        }
        return false;
    }

    /**
     * Searches and deletes a found node from the nodelist.
     * Special care must be taken if the node is not the last one in the list : we need to change the next property of
     * the previous node to the next property of the node to be deleted.
     * @param string|null $query
     */
    public function delete(string $query = NULL)
    {
        if ($this->_firstNode) {
            $previous = NULL;
            $currentNode = $this->_firstNode;

            while ($currentNode->next !== NULL) {
                if ($currentNode->data === $query) {
                    // Check if the found node is the last of the nodelist. If so, just delete the next property of the
                    // previous node. If not, set the next property of the previous node to the next property of the
                    // found node, effectively removing it from the list.
                    if ($currentNode->next === NULL) {
                        $previous->next = NULL;
                    } else {
                        $previous->next = $currentNode->next;
                    }

                    $this->_totalNodes--;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

}