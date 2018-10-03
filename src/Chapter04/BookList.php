<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 16:23
 */

namespace App\Chapter04;


use App\Chapter03\LinkedList;
use UnderflowException;

class BookList implements Stack
{

    private $stack;

    /**
     * BookList constructor.
     * @param $stack
     */
    public function __construct()
    {
        $this->stack = new LinkedList();
    }


    /**
     * Adds an item to the stack.
     * @param string $item
     * @return mixed
     */
    public function push(string $item)
    {
        $this->stack->insert($item);
    }

    /**
     * Removes an item from the stack.
     * @return string
     */
    public function pop() : string
    {
        if ($this->isEmpty()){
            throw new UnderflowException("Stack is empty.");
        } else {
            $lastItem = $this->top();
            $this->stack->deleteLast();
            return $lastItem;
        }
    }

    /**
     * Returns the top element of the stack.
     * @return mixed
     */
    public function top()
    {
        return $this->stack->getItemByPosition($this->stack->getSize())->data;
    }

    /**
     * Returns whether the stack is empty.
     * @return bool
     */
    public function isEmpty()
    {
        return $this->stack->getSize() == 0;
    }

}