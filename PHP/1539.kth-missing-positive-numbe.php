<?php
/**
 * 原题给的K值范围很小，所以暴力破解也是可以的。
 * 但是正确的做法还是根据递增规律，二分查找
 */

class Solution {

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer
     */
    // 使用二分查找
    function findKthPositive($arr, $k) {
        if ($arr[0] > $k) {
            return $k;
        }
        $total = count($arr);
        $left = 0;
        $right = $total;
        while ($left < $right) {
            $mid = intval(($left + $right)/2);
            $x = $mid >= $total ? 10000000 : $arr[$mid];
            if ($x - $mid - 1 >= $k) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        return  $k + $left;
    }

    // 暴力
    function findKthPositive($arr, $k) {
        $i = 0;
        while ($k) {
            $i ++;
            if (!in_array($i, $arr)) {
                $k --;
            }
        }
        return $i;
    }
}
