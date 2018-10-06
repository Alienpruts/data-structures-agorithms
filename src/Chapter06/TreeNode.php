<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 6/10/18
 * Time: 11:04
 */

namespace App\Chapter06;


class TreeNode
{
    public $data = NULL;
    public $children = [];

    /**
     * TreeNode constructor.
     * @param $data
     */
    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function addChildren(TreeNode $node)
    {
        $this->children[] = $node;
    }


}