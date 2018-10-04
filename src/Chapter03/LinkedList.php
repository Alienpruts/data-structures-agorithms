<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 15:26
 */

namespace App\Chapter03;


class LinkedList implements \Iterator
{
    protected $_firstNode = NULL;
    protected $_totalNodes = 0;
    protected $_currentNode = NULL;
    protected $_currentPosition = 0;

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

    /**
     * Reverses the list order.
     * This is implemented by an "in place reverse" : this keeps track of the current, previous and next nodes and
     * switches them around before repeating the process.
     */
    public function reverse()
    {
        // Only perform the reverse process if at least two items are found.
        if ($this->_firstNode !== NULL){
            if ($this->_firstNode->next !== NULL){
                $previousNode = NULL;
                $next = NULL;
                $currentNode = $this->_firstNode;
                // Iterate through the list, switch the previous, current and next while iterating.
                while ($currentNode !== NULL){
                    $next = $currentNode->next;
                    $currentNode->next = $previousNode;
                    $previousNode = $currentNode;
                    $currentNode = $next;
                }
                // Finally, do not forget to set the firstNode.
                $this->_firstNode = $previousNode;
            }
        }
    }

    /**
     * Searches and returns a node from the node list by position.
     * Iterates through node list and return node at position. POSITION DOES NOT START AT 0 !
     * @param int $position
     * @return ListNode
     */
    public function getItemByPosition(int $position = 0)
    {
        $count = 1;
        if ($this->_firstNode !== NULL){
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($count === $position){
                    return $currentNode;
                }
                $count++;
                $currentNode = $currentNode->next;
            }
        }

    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->_currentNode->data;
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->_currentPosition++;
        $this->_currentNode = $this->_currentNode->next;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->_currentPosition;
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return $this->_currentNode !== NULL;
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->_currentPosition = 0;
        $this->_currentNode = $this->_firstNode;
    }


    /**
     * Return the size of the list (ie. the number of nodes).
     * @return int
     */
    public function getSize()
    {
        return $this->_totalNodes;
    }
}