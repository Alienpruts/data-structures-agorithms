<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 3/10/18
 * Time: 23:04
 */

namespace App\Chapter04;


use App\Chapter03\ListNode;

class PriorityQueueListNode extends ListNode
{

    public $data = NULL;
    public $next = NULL;
    public $priority = NULL;

    /**
     * PriorityQueueListNode constructor.
     * @param null $data
     * @param null $priority
     */
    public function __construct(string $data = NULL, int $priority = NULL)
    {
        $this->data = $data;
        $this->priority = $priority;
    }
    
}