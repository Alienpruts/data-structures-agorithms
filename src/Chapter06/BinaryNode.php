<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 6/10/18
 * Time: 13:52
 */

namespace App\Chapter06;


class BinaryNode
{
    public $data;
    public $left;
    public $right;

    /**
     * BinaryNode constructor.
     * @param $data
     */
    public function __construct( string $data = NULL)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }

    public function addChildren(BinaryNode $right, BinaryNode $left)
    {
        $this->left = $left;
        $this->right = $right;
    }


}