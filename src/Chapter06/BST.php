<?php
/**
 * Created by PhpStorm.
 * User: bert
 * Date: 8/10/18
 * Time: 19:58
 */

namespace App\Chapter06;


class BST
{
    public $root = NULL;

    /**
     * BST constructor.
     * @param null $root
     */
    public function __construct(int $data)
    {
        $this->root = new Node($data);
    }

    /**
     * Checks if the BST is empty.
     * @return bool
     */
    public function isEmpty() : bool
    {
        return $this->root === NULL;
    }

    /**
     * Insert a new node while preserving the sorting of the BST.
     * @param int $data
     * @return Node|null
     */
    public function insert(int $data)
    {
        // If there is no root node, insert this one.
        if ($this->isEmpty()){
            $node = new Node($data);
            $this->root = $node;
            return $node;
        }

        $node = $this->root;

        // Traverse tree starting from root node, compare if data is larger than the current node. If so, check if there
        // is already a node there and add when not. Same for when data is smaller.
        while ($node) {
            if ($data > $node->data){
                // If there already is a node on the right side, traverse that node.
                if ($node->right) {
                    $node = $node->right;
                // If there is no node on the right side, insert the new node here.
                } else {
                    $node->right = new Node($data);
                    $node = $node->right;
                    break;
                }
            } elseif ($data < $node->data){
                if ($node->left) {
                    $node = $node->left;
                } else {
                    $node->left = new Node($data);
                    $node = $node->left;
                    break;
                }
            } else {
                break;
            }
        }
        return $node;
    }

    /**
     * Recursively traverse the tree and display the left values first (will sort from lowest to highest).
     * @param Node $node
     */
    public function traverse(Node $node)
    {
        if ($node) {
            if ($node->left){
                $this->traverse($node->left);
            }

            // If there is no left node, display the current node's data.
            echo $node->data . PHP_EOL;

            if ($node->right){
                $this->traverse($node->right);
            }
        }
    }

    /**
     * Search the BST for a given value by comparing values of nodes and traversing the subtrees.
     * @param int $data
     * @return Node|bool|null
     */
    public function search(int $data)
    {
        if ($this->isEmpty()){
            return false;
        }

        $node = $this->root;
        // Traverse the tree, when search data is larger - check right side of tree, if lower, check left side.
        while ($node) {
            if ($data > $node->data) {
                $node = $node->right;
            } elseif ($data < $node->data) {
                $node = $node->left;
            } else {
                break;
            }
        }

        return $node;
    }
}