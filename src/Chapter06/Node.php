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
    public $parent;


    /**
     * Node constructor.
     * @param int|null $data
     * @param Node|null $parent
     */
    public function __construct(int $data = NULL, Node $parent = NULL)
    {
        $this->data = $data;
        $this->left = NULL;
        $this->right = NULL;
        $this->parent = $parent;
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

    /**
     * Deletes a node form the BST.
     * We have three distinct cases for deleting a node :
     *  1 ) the node is a leaf (does not have children)
     *  2 ) the node has one child (left or right)
     *  3 ) the node has two children.
     */
    public function delete()
    {
        $node = $this;

        // Case : the node is a leaf.
        // Delete the parent's child, since this is the node to delete.
        if (!$node->left && !$node->right) {
            if ($node->parent->left === $node) {
                $node->parent->left = NULL;
            } else {
                $node->parent->right = NULL;
            }
        // Case : the node has two children, left and right.
        } elseif ($node->left && $node->right) {
            $successor = $node->successor();
            $node->data = $successor->data;
            $successor->delete();
        // Case : the node has one child, either right, or left.
        } elseif ($node->left) {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->left;
                $node->left->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->left;
                $node->left->parent = $node->parent->right;
            }
            $node->left = NULL;
        } elseif ($node->right) {
            if ($node->parent->left === $node) {
                $node->parent->left = $node->right;
                $node->right->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->right;
                $node->right->parent = $node->parent->right;
            }
            $node->right = NULL;
        }

    }




}