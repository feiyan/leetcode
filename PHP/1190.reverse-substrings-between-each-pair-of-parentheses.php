<?php

class Solution {

    /**
     * @desc 参考下其他人的解题思路。核心思想就是栈操作，遇到左括号栈顶就压入空串，遇到右括号就反转栈顶并与栈顶第二个元素合并，其他情况栈顶直接累加元素，最后输出栈内唯一元素。
     * @param String $s
     * @return String
     */
    function reverseParentheses($s) {
        echo $s."\n";
        $arr = [""];
        for($i=0; $i<strlen($s); $i++) {
            $c = $s[$i];
            $idx = count($arr);
            if ($c == '(') {
                array_push($arr, "");
                echo $c."\t".implode(',', $arr)."\n";
            } else if ($c == ')') {
                //每次遇到右括号，则相邻的2个进行合并
                $arr[$idx-2] = $arr[$idx-2].strrev($arr[$idx - 1]);
                echo $c."\t".implode(',', $arr)."\n";
                array_pop($arr);
            } else {
                $arr[$idx-1] .= $c;
                echo $c."\t".implode(',', $arr)."\n";
            }
            
        }
        return implode('', $arr);
    }
}

$s1 = "(ed(et(oc))el)";
$s2 = "a(bcdefghijkl(mno)p)q";
$s = new Solution();
$s->reverseParentheses($s1);
$s->reverseParentheses($s2);
