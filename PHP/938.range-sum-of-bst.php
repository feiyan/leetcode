<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $L
     * @param Integer $R
     * @return Integer
     */
    function rangeSumBST($root, $L, $R) {
        $t = 0;
        $queue = [];
        $queue[] = $root;
        while ($queue) {
             $node = array_pop($queue);
             if ($node->val && $node->val >= $L && $node->val <= $R) {
                 $t += $node->val;
             }
             if ($node->left) {
                 $queue[] = $node->left;
             }
             if ($node->right) {
                 $queue[] = $node->right;
             }
        }
        return $t;
    }

    /**
     * @desc 递归更简洁
     * @param TreeNode $root
     * @param Integer $L
     * @param Integer $R
     * @return Integer
     */
    function rangeSumBST2($root, $L, $R) {
        $t = 0;
        if ($root->val && $root->val >= $L && $root->val <= $R) {
            $t += $root->val;
        }
        if ($root->left) {
            $t += $this->rangeSumBST($root->left,  $L, $R);
        }
        if ($root->right) {
            $t += $this->rangeSumBST($root->right,  $L, $R);
        }
        return $t;
    }
}
