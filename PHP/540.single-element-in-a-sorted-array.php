<?php

class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    //使用二分查找的方式，确定边界，效果好很多
    function singleNonDuplicateByBinarySearch($nums) {
        $total = count($nums);
        $l = 1;
        $r = $total - 2;
        while ($l <= $r) {
            $mid = intval(($l + $r) / 2);
            $x = $nums[$mid-1];
            $y = $nums[$mid];
            $z = $nums[$mid+1];
            if ($x != $y && $y != $z) {
                return $y;
            } else if ($x == $y && $y != $z) {
                if ($mid == $total - 2) {
                    return $z;
                }
                if ($mid % 2 == 0) {
                    $r = $mid - 1;
                } else {
                    $l = $mid + 1;
                }
            } else if ($x != $y && $y == $z) {
                if ($mid == 1) {
                    return $x;
                }
                if ($mid % 2 == 0) {
                    $l = $mid + 1;
                } else {
                    $r = $mid - 1;
                }
            }
        }
        return 0;
    }
    
    function singleNonDuplicate($nums) {
        $total = count($nums);
        while ($nums) {
            $x = array_shift($nums);
            $y = array_shift($nums);
            if ($x != $y) {
                return $x;
            }
        }
        return 0;
    }
}

// Tests
$s = new Solution();
$t = $s->singleNonDuplicate([1,3,3]);
var_dump($t);
$t = $s->singleNonDuplicate([1,1,2,2,3]);
var_dump($t);
$t = $s->singleNonDuplicate([1,1,2,3,3,4,4,8,8]);
var_dump($t);
$t = $s->singleNonDuplicate([3,3,7,7,10,11,11]);
var_dump($t);
