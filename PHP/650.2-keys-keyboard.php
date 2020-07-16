<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function minSteps($n) {
        $step = 0;
        while (true) {
            $non_div = true;
            $mid = intval($n/2);
            for ($i=$mid; $i>=1; $i--) {
                if ($n % $i == 0) {
                    $non_div = false;
                    $step += $n / $i;
                    $n = $i;
                    $break;
                }
            }
            if ($non_div) {
                return $step;
            }
        }
    }
}

$s = new Solution();
var_dump($s->minSteps(1));
var_dump($s->minSteps(2));
var_dump($s->minSteps(3));
var_dump($s->minSteps(7));
var_dump($s->minSteps(8));
var_dump($s->minSteps(12));
var_dump($s->minSteps(16));

/**
已完成
执行用时：12 ms
输入 1 2 3 7 8 12 16
输出 0 2 3 7 6 7 8
预期结果 0 2 3 7 6 7 8
*/