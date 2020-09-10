<?php

class Solution {

    /**
     * @param Integer $N
     * @return Integer
     */
    function fib($N) {
        $arr = [
            0 => 0,
            1 => 1,
        ];
        if ($N > 1) {
            for ($i=2; $i<=$N; $i++) {
                $arr[$i] = $arr[$i-1] + $arr[$i-2];
            }
        }
        return $arr[$N];
    }
}
