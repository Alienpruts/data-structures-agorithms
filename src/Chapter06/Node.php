<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 8/10/18
 * Time: 13:42
 */

namespace App\Chapter06;


class Node
{

    public $data;
    public $left;
    public $right;


    /**
     * Node constructor.
     * @param int $data
     */
    public function __construct(int $data)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
    }

    /**
     * Find the minimum value of the BST.
     * Since a BST is sorted (smaller values to the left), we traverse the left side of the tree.
     * @return Node|null
     */
    public function min()
    {
        $node = $this;

        // As long as there is a left child to the parent, set the current node to that left node.
        while ($node->left) {
            $node = $node->left;
        }

        return $node;
    }

    /**
     * Find the maximum value of the BST.
     * Since a BST is sorted (larger values to the right), we traverse the right side of the tree.
     * @return Node|null
     */
    public function max()
    {
        $node = $this;

        while ($node->right){
            $node = $node->right;
        }

        return $node;
    }

    /**
     * Search and returns the successor of this node.
     * We search the minimum value of a node from the right subtree.
     * @return Node|null
     */
    public function successor()
    {
        $node = $this;

        if ($node->right) {
            return $node->right->min();
        } else {
            return NULL;
        }
    }

    /**
     * Search and returns the predecessor of this node.
     * We search the maximum value of a node from the left subtree.
     * @return Node|null
     */
    public function predecessor()
    {
        $node = $this;
        if ($node->left) {
            return $node->right->max();
        } else {
            return NULL;
        }
    }




}