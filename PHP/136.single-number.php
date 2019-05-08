<?php
/**
 * @desc 
 * @url https://leetcode.com/problems/single-number/
 */
class Solution {

    public function __construct(){
        $nums = array(4,1,2,1,2);
        $num = $this->singleNumber2($nums);
        var_dump($num);
    }

    /**
     * 最开始的考虑；
     */
    function singleNumber($nums) {
        $arr = array_count_values($nums);
        asort($arr);
        return key($arr);
    }

    /**
     * 最优解法；
     */
    function singleNumber2($nums) {
        $n = 0;
        foreach($nums as $num){
            $n ^= $num;
        }
        return $n;
    }
}

/**
位运算
& 当都为1时返回1，其他为0；
| 当任一为1时返回1，其他为0；
^ 按位异或，不同时返回1，相同返回0；
*/
