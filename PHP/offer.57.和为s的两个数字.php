<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $len = count($nums);
        $idx = $len - 1;
        if ($target < $nums[$idx]) {
            $left = 0;
            $right = $len;
            $prev_is_lower = false;
            while ($left < $right-1) {
                $mid = intval(($left + $right)/2);
                if ($nums[$mid] >= $target) {
                    if ($prev_is_lower) {
                        $idx = $mid;
                        break;
                    } else {
                        $right = $mid;
                        $prev_is_lower = false;
                    }
                } else {
                    $left = $mid;
                    $prev_is_lower = true;
                }
            }
        }
        foreach ($nums as $k=>$v) {
            if ($v >= $target) {
                $idx = $k;
                break;
            }
        }
        for ($j = $idx; $j > 0; $j--) {
            $t = $target - $nums[$j];
            for ($i = 0; $i < $j; $i++) {
                if ($nums[$i] == $t) {
                    return [$nums[$i], $nums[$j]];
                }
            }
        }
        return [];
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSumFirst($nums, $target) {
        $idx = count($nums) - 1;
        foreach ($nums as $k=>$v) {
            if ($v >= $target) {
                $idx = $k;
                break;
            }
        }
        for ($j = $idx; $j > 0; $j--) {
            $t = $target - $nums[$j];
            for ($i = 0; $i < $j; $i++) {
                if ($nums[$i] == $t) {
                    return [$nums[$i], $nums[$j]];
                }
            }
        }
        return [];
    }
}
