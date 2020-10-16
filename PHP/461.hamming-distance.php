<?php

class Solution {
    /**
     * @param Integer $x
     * @param Integer $y
     * @return Integer
     */
    function hammingDistance($x, $y) {
        return substr_count(decbin($x ^ $y), "1");
    }

    /**
     * @desc 返回其二进制表达式中数字位数为 ‘1’ 的个数
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n) {
        return substr_count(decbin($n), "1");
    }
}

// Tests
// Number 1
// 0 0 0 1
// Number 4
// 0 1 0 0
$s = new Solution();
$t = $s->hammingDistance(1, 4);
