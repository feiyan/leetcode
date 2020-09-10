<?php

class Solution {

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function lenLongestFibSubseq($A) {
        $m = [];
        $keys = array_fill_keys($A, 1);
        $total = count($A);
        for ($i=0; $i<$total; $i++) {
            for ($j=$i+1; $j<$total; $j++) {
                $a = $A[$j];
                $b = $A[$i] + $A[$j];
                $count = 2;
                while (isset($keys[$b])) {
                    $t = $a;
                    $a = $b;
                    $b = $t + $b;
                    $count ++;
                }
                if ($count > 2) {
                    $m[] = $count;
                }
            }
        }
        return $m ? max($m) : 0;
    }
}
