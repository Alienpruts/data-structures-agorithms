<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 16:01
 */

namespace App\Chapter04;


use OverflowException;
use UnderflowException;

class Books implements Stack
{

    private $limit;
    private $stack;

    /**
     * Books constructor.
     * @param $limit
     */
    public function __construct(int $limit = 20)
    {
        $this->limit = $limit;
        $this->stack = [];
    }

    /**
     * @inheritdoc
     * @param string $item
     * @return mixed|void
     */
    public function push(string $item)
    {
        if (count($this->stack) < $this->limit){
            array_push($this->stack, $item);
        } else {
            throw new OverflowException("Stack is full");
        }
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function pop() : string
    {
        if ($this->isEmpty()) {
            throw new UnderflowException("Stack is empty");
        } else {
            return array_pop($this->stack);
        }
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function top() : string
    {
        return end($this->stack);
    }

    /**
     * @inheritdoc
     * @return bool
     */
    public function isEmpty() : bool
    {
        return empty($this->stack);
    }
}