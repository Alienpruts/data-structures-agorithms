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
                    $node->right = new Node($data, $node);
                    $node = $node->right;
                    break;
                }
            } elseif ($data < $node->data){
                if ($node->left) {
                    $node = $node->left;
                } else {
                    $node->left = new Node($data, $node);
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
     * @param string $type
     */
    public function traverse(Node $node, string $type = "in-order")
    {
        switch($type) {
            case "in-order":
                $this->inOrder($node);
                break;
            case "pre-order":
                $this->preOrder($node);
                break;
            case "post-order":
                $this->postOrder($node);
                break;
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

    /**
     * Remove a node from the BST.
     * First a search is performed and if found, the node is removed from the tree.
     * @param int $data
     */
    public function remove(int $data)
    {
        $node = $this->search($data);
        if ($node){
            $node->delete();
        }
    }

    /**
     * Perform a Pre Order traversal on the BST.
     * Pre order traversal means that parent node is traversed, then the left child node, followed by right child node.
     * @param Node $node
     */
    public function preOrder(Node $node)
    {
        if ($node) {
            echo $node->data . " ";
            if ($node->left) {
                $this->traverse($node->left);
            }
            if ($node->right) {
                $this->traverse($node->right);
            }
        }
    }

    /**
     * Performs a In Order traversal on the BST.
     * In order traversal means that the left child node is traversed, then the parent node, followed by the right child
     * node.
     * @param Node $node
     */
    public function inOrder(Node $node)
    {
        if ($node) {
            if ($node->left) {
                $this->traverse($node->left);
            }
            echo $node->data . " ";

            if ($node->right) {
                $this->traverse($node->right);
            }
        }
    }

    /**
     * Performs a Post Order traversal on the BST.
     * Post Order traversal means that first all left children are traversed, then all right children, followed by the
     * parent nodes, ending in the root node.
     * @param Node $node
     */
    public function postOrder(Node $node)
    {
        if ($node) {
            if ($node->left) {
                $this->traverse($node->left);
            }
            if ($node->right) {
                $this->traverse($node->right);
            }
            echo $node->data . " ";
        }
    }
}