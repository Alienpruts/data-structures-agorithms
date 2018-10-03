<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 9:45
 */

namespace App\Chapter03;


class DoublyListNode
{
    public $data = NULL;
    public $next = NULL;
    public $prev = NULL;

    /**
     * DoublyListNode constructor.
     */
    public function __construct(string $data = NULL)
    {
        $this->data = $data;
    }


}