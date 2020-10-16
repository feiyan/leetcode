<?php

class Solution {
    /**
     * @param Integer $n
     * @return Integer[]
     */
    function sumZero($n) {
        $arr = [];
        $mid = intval($n / 2);
        for ($i = 1; $i <= $mid; $i++) {
            $arr[] = $i;
            $arr[] = 0 - $i;
        }
        if (count($arr) != $n) {
            $arr[] = 0;
        }
        return $arr;
    }
}
