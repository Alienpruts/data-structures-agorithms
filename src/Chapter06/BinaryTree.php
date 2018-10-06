<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 6/10/18
 * Time: 14:02
 */

namespace App\Chapter06;


class BinaryTree
{
    public $root = NULL;

    /**
     * BinaryTree constructor.
     * @param null $root
     */
    public function __construct(BinaryNode $node)
    {
        $this->root = $node;
    }

    /**
     * Traverse Binary Tree recursively.
     * @param BinaryNode $node
     * @param int $level
     */
    public function traverse(BinaryNode $node, int $level = 0)
    {
        if ($node){
            echo str_repeat("-" ,$level);
            echo $node->data . PHP_EOL;

            if ($node->right) {
                $this->traverse($node->right, $level + 1);
            }
            if ($node->left) {
                $this->traverse($node->left, $level + 1);
            }
        }
    }


}