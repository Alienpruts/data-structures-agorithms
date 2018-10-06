<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 6/10/18
 * Time: 11:07
 */

namespace App\Chapter06;


class Tree
{
    public $root = NULL;

    /**
     * Tree constructor.
     * @param null $root
     */
    public function __construct(TreeNode $node)
    {
        $this->root = $node;
    }

    /**
     * Traverses a complete tree recursively.
     * @param Treenode $node
     *  The node from which to start the traversing.
     * @param int $level
     */
    public function traverse(Treenode $node, int $level = 0)
    {
        if ($node){
            echo str_repeat("-", $level);
            echo $node->data . PHP_EOL;

            foreach ($node->children as $childNode) {
                $this->traverse($childNode, $level + 1);
            }
        }
    }


}