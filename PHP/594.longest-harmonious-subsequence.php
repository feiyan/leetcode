<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findLHS($nums) {
        $arr = array_count_values($nums);
        if( $arr ){
            $values = array();
            ksort($arr);
            $prevKey = key($arr);
            $prevVal = current($arr);
            foreach ($arr as $currKey=>$currVal) {
                if (abs($currKey - $prevKey) == 1) {
                    $values[] = $currVal + $prevVal;
                }
                $prevKey = $currKey;
                $prevVal = $currVal;
            }
            return empty($values) ? 0 : max($values);
        }
        return 0;
    }
}
