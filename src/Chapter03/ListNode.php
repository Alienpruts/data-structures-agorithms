<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 2/10/18
 * Time: 15:24
 */

namespace App\Chapter03;


class ListNode
{
    public $data = NULL;
    public $next = NULL;


    /**
     * ListNode constructor.
     */
    public function __construct(string $data = NULL)
    {
        $this->data = $data;
    }
}