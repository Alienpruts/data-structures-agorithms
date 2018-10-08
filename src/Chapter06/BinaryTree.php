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
    public $nodes = [];

    /**
     * BinaryTree constructor.
     * @param array $nodes
     */
    public function __construct(array $nodes)
    {
        $this->nodes = $nodes;
    }

    /**
     * Traverse Binary Tree recursively.
     * @param int $num
     * @param int $level
     */
    public function traverse(int $num = 0, int $level = 0)
    {
        if (isset($this->nodes[$num])){
            echo str_repeat("-" ,$level);
            echo $this->nodes[$num] . PHP_EOL;

            // We can see that node 0 is parent, while 1 is right, and 2 is left. So in algorithm :
            // 2 * n + 1 AND 2 * (n + 1).
            // So for node 0 : right = 2 * 0 + 1 = 1 AND left = 2 * (0 + 1) = 2.
            $this->traverse(2 * $num + 1, $level + 1);
            $this->traverse(2 * ($num + 1), $level + 1);
        }
    }


}