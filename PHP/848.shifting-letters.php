<?php
/**
 * 需要注意姓名，比如shifts量级比较大
 */

class Solution {

    /**
     * @param String $S
     * @param Integer[] $shifts
     * @return String
     */
    //在Go和Python文件中循环优化为1次
    function shiftingLetters($S, $shifts) {
        //a=97 z=122
        $map = [];
        $total = count($shifts) - 1;
        $sum = 0;
        for ($i=$total; $i >= 0; $i--) {
            $sum += $shifts[$i];
            $sum = $sum % 26;
            $map[$i] = $sum;
        }
        $str = "";
        for ($i=0; $i < strlen($S); $i++) {
            $v = ord($S[$i]);
            $v += $map[$i]%26;
            if ($v > 122) {
                $v -= 26;
            }
            $str .= chr($v);
        }
        return $str;
    }

    // 生成转换HashMap，减少ord和chr调用次数
    function shiftingLettersV2($S, $shifts) {
        //a=97 z=122
        $map = [];
        for ($i=97; $i<=122; $i++) {
            for ($j=0; $j<=25; $j++) {
                $n = $i + $j;
                $n = $n > 122 ? $n - 26 : $n;
                $map[chr($i)][$j] = chr($n);
            }
        }
        $total = count($shifts) - 1;
        $sum = 0;
        $str = "";
        for ($i=$total; $i >= 0; $i--) {
            $sum += $shifts[$i];
            $sum = $sum % 26;
            $map[$i] = $sum;
            $c = $S[$i];
            $str = $map[$c][$sum].$str;
        }
        return $str;
    }

    function shiftingLettersV3($S, $shifts) {
        //a=97 z=122
        $map = [           
            'a' => [0 => 'a', 1 => 'b', 2 => 'c', 3 => 'd', 4 => 'e', 5 => 'f', 6 => 'g', 7 => 'h', 8 => 'i', 9 => 'j', 10 => 'k', 11 => 'l', 12 => 'm', 13 => 'n', 14 => 'o', 15 => 'p', 16 => 'q', 17 => 'r', 18 => 's', 19 => 't', 20 => 'u', 21 => 'v', 22 => 'w', 23 => 'x', 24 => 'y', 25 => 'z', ],
            'b' => [0 => 'b', 1 => 'c', 2 => 'd', 3 => 'e', 4 => 'f', 5 => 'g', 6 => 'h', 7 => 'i', 8 => 'j', 9 => 'k', 10 => 'l', 11 => 'm', 12 => 'n', 13 => 'o', 14 => 'p', 15 => 'q', 16 => 'r', 17 => 's', 18 => 't', 19 => 'u', 20 => 'v', 21 => 'w', 22 => 'x', 23 => 'y', 24 => 'z', 25 => 'a', ],
            'c' => [0 => 'c', 1 => 'd', 2 => 'e', 3 => 'f', 4 => 'g', 5 => 'h', 6 => 'i', 7 => 'j', 8 => 'k', 9 => 'l', 10 => 'm', 11 => 'n', 12 => 'o', 13 => 'p', 14 => 'q', 15 => 'r', 16 => 's', 17 => 't', 18 => 'u', 19 => 'v', 20 => 'w', 21 => 'x', 22 => 'y', 23 => 'z', 24 => 'a', 25 => 'b', ],
            'd' => [0 => 'd', 1 => 'e', 2 => 'f', 3 => 'g', 4 => 'h', 5 => 'i', 6 => 'j', 7 => 'k', 8 => 'l', 9 => 'm', 10 => 'n', 11 => 'o', 12 => 'p', 13 => 'q', 14 => 'r', 15 => 's', 16 => 't', 17 => 'u', 18 => 'v', 19 => 'w', 20 => 'x', 21 => 'y', 22 => 'z', 23 => 'a', 24 => 'b', 25 => 'c', ],
            'e' => [0 => 'e', 1 => 'f', 2 => 'g', 3 => 'h', 4 => 'i', 5 => 'j', 6 => 'k', 7 => 'l', 8 => 'm', 9 => 'n', 10 => 'o', 11 => 'p', 12 => 'q', 13 => 'r', 14 => 's', 15 => 't', 16 => 'u', 17 => 'v', 18 => 'w', 19 => 'x', 20 => 'y', 21 => 'z', 22 => 'a', 23 => 'b', 24 => 'c', 25 => 'd', ],
            'f' => [0 => 'f', 1 => 'g', 2 => 'h', 3 => 'i', 4 => 'j', 5 => 'k', 6 => 'l', 7 => 'm', 8 => 'n', 9 => 'o', 10 => 'p', 11 => 'q', 12 => 'r', 13 => 's', 14 => 't', 15 => 'u', 16 => 'v', 17 => 'w', 18 => 'x', 19 => 'y', 20 => 'z', 21 => 'a', 22 => 'b', 23 => 'c', 24 => 'd', 25 => 'e', ],
            'g' => [0 => 'g', 1 => 'h', 2 => 'i', 3 => 'j', 4 => 'k', 5 => 'l', 6 => 'm', 7 => 'n', 8 => 'o', 9 => 'p', 10 => 'q', 11 => 'r', 12 => 's', 13 => 't', 14 => 'u', 15 => 'v', 16 => 'w', 17 => 'x', 18 => 'y', 19 => 'z', 20 => 'a', 21 => 'b', 22 => 'c', 23 => 'd', 24 => 'e', 25 => 'f', ],
            'h' => [0 => 'h', 1 => 'i', 2 => 'j', 3 => 'k', 4 => 'l', 5 => 'm', 6 => 'n', 7 => 'o', 8 => 'p', 9 => 'q', 10 => 'r', 11 => 's', 12 => 't', 13 => 'u', 14 => 'v', 15 => 'w', 16 => 'x', 17 => 'y', 18 => 'z', 19 => 'a', 20 => 'b', 21 => 'c', 22 => 'd', 23 => 'e', 24 => 'f', 25 => 'g', ],
            'i' => [0 => 'i', 1 => 'j', 2 => 'k', 3 => 'l', 4 => 'm', 5 => 'n', 6 => 'o', 7 => 'p', 8 => 'q', 9 => 'r', 10 => 's', 11 => 't', 12 => 'u', 13 => 'v', 14 => 'w', 15 => 'x', 16 => 'y', 17 => 'z', 18 => 'a', 19 => 'b', 20 => 'c', 21 => 'd', 22 => 'e', 23 => 'f', 24 => 'g', 25 => 'h', ],
            'j' => [0 => 'j', 1 => 'k', 2 => 'l', 3 => 'm', 4 => 'n', 5 => 'o', 6 => 'p', 7 => 'q', 8 => 'r', 9 => 's', 10 => 't', 11 => 'u', 12 => 'v', 13 => 'w', 14 => 'x', 15 => 'y', 16 => 'z', 17 => 'a', 18 => 'b', 19 => 'c', 20 => 'd', 21 => 'e', 22 => 'f', 23 => 'g', 24 => 'h', 25 => 'i', ],
            'k' => [0 => 'k', 1 => 'l', 2 => 'm', 3 => 'n', 4 => 'o', 5 => 'p', 6 => 'q', 7 => 'r', 8 => 's', 9 => 't', 10 => 'u', 11 => 'v', 12 => 'w', 13 => 'x', 14 => 'y', 15 => 'z', 16 => 'a', 17 => 'b', 18 => 'c', 19 => 'd', 20 => 'e', 21 => 'f', 22 => 'g', 23 => 'h', 24 => 'i', 25 => 'j', ],
            'l' => [0 => 'l', 1 => 'm', 2 => 'n', 3 => 'o', 4 => 'p', 5 => 'q', 6 => 'r', 7 => 's', 8 => 't', 9 => 'u', 10 => 'v', 11 => 'w', 12 => 'x', 13 => 'y', 14 => 'z', 15 => 'a', 16 => 'b', 17 => 'c', 18 => 'd', 19 => 'e', 20 => 'f', 21 => 'g', 22 => 'h', 23 => 'i', 24 => 'j', 25 => 'k', ],
            'm' => [0 => 'm', 1 => 'n', 2 => 'o', 3 => 'p', 4 => 'q', 5 => 'r', 6 => 's', 7 => 't', 8 => 'u', 9 => 'v', 10 => 'w', 11 => 'x', 12 => 'y', 13 => 'z', 14 => 'a', 15 => 'b', 16 => 'c', 17 => 'd', 18 => 'e', 19 => 'f', 20 => 'g', 21 => 'h', 22 => 'i', 23 => 'j', 24 => 'k', 25 => 'l', ],
            'n' => [0 => 'n', 1 => 'o', 2 => 'p', 3 => 'q', 4 => 'r', 5 => 's', 6 => 't', 7 => 'u', 8 => 'v', 9 => 'w', 10 => 'x', 11 => 'y', 12 => 'z', 13 => 'a', 14 => 'b', 15 => 'c', 16 => 'd', 17 => 'e', 18 => 'f', 19 => 'g', 20 => 'h', 21 => 'i', 22 => 'j', 23 => 'k', 24 => 'l', 25 => 'm', ],
            'o' => [0 => 'o', 1 => 'p', 2 => 'q', 3 => 'r', 4 => 's', 5 => 't', 6 => 'u', 7 => 'v', 8 => 'w', 9 => 'x', 10 => 'y', 11 => 'z', 12 => 'a', 13 => 'b', 14 => 'c', 15 => 'd', 16 => 'e', 17 => 'f', 18 => 'g', 19 => 'h', 20 => 'i', 21 => 'j', 22 => 'k', 23 => 'l', 24 => 'm', 25 => 'n', ],
            'p' => [0 => 'p', 1 => 'q', 2 => 'r', 3 => 's', 4 => 't', 5 => 'u', 6 => 'v', 7 => 'w', 8 => 'x', 9 => 'y', 10 => 'z', 11 => 'a', 12 => 'b', 13 => 'c', 14 => 'd', 15 => 'e', 16 => 'f', 17 => 'g', 18 => 'h', 19 => 'i', 20 => 'j', 21 => 'k', 22 => 'l', 23 => 'm', 24 => 'n', 25 => 'o', ],
            'q' => [0 => 'q', 1 => 'r', 2 => 's', 3 => 't', 4 => 'u', 5 => 'v', 6 => 'w', 7 => 'x', 8 => 'y', 9 => 'z', 10 => 'a', 11 => 'b', 12 => 'c', 13 => 'd', 14 => 'e', 15 => 'f', 16 => 'g', 17 => 'h', 18 => 'i', 19 => 'j', 20 => 'k', 21 => 'l', 22 => 'm', 23 => 'n', 24 => 'o', 25 => 'p', ],
            'r' => [0 => 'r', 1 => 's', 2 => 't', 3 => 'u', 4 => 'v', 5 => 'w', 6 => 'x', 7 => 'y', 8 => 'z', 9 => 'a', 10 => 'b', 11 => 'c', 12 => 'd', 13 => 'e', 14 => 'f', 15 => 'g', 16 => 'h', 17 => 'i', 18 => 'j', 19 => 'k', 20 => 'l', 21 => 'm', 22 => 'n', 23 => 'o', 24 => 'p', 25 => 'q', ],
            's' => [0 => 's', 1 => 't', 2 => 'u', 3 => 'v', 4 => 'w', 5 => 'x', 6 => 'y', 7 => 'z', 8 => 'a', 9 => 'b', 10 => 'c', 11 => 'd', 12 => 'e', 13 => 'f', 14 => 'g', 15 => 'h', 16 => 'i', 17 => 'j', 18 => 'k', 19 => 'l', 20 => 'm', 21 => 'n', 22 => 'o', 23 => 'p', 24 => 'q', 25 => 'r', ],
            't' => [0 => 't', 1 => 'u', 2 => 'v', 3 => 'w', 4 => 'x', 5 => 'y', 6 => 'z', 7 => 'a', 8 => 'b', 9 => 'c', 10 => 'd', 11 => 'e', 12 => 'f', 13 => 'g', 14 => 'h', 15 => 'i', 16 => 'j', 17 => 'k', 18 => 'l', 19 => 'm', 20 => 'n', 21 => 'o', 22 => 'p', 23 => 'q', 24 => 'r', 25 => 's', ],
            'u' => [0 => 'u', 1 => 'v', 2 => 'w', 3 => 'x', 4 => 'y', 5 => 'z', 6 => 'a', 7 => 'b', 8 => 'c', 9 => 'd', 10 => 'e', 11 => 'f', 12 => 'g', 13 => 'h', 14 => 'i', 15 => 'j', 16 => 'k', 17 => 'l', 18 => 'm', 19 => 'n', 20 => 'o', 21 => 'p', 22 => 'q', 23 => 'r', 24 => 's', 25 => 't', ],
            'v' => [0 => 'v', 1 => 'w', 2 => 'x', 3 => 'y', 4 => 'z', 5 => 'a', 6 => 'b', 7 => 'c', 8 => 'd', 9 => 'e', 10 => 'f', 11 => 'g', 12 => 'h', 13 => 'i', 14 => 'j', 15 => 'k', 16 => 'l', 17 => 'm', 18 => 'n', 19 => 'o', 20 => 'p', 21 => 'q', 22 => 'r', 23 => 's', 24 => 't', 25 => 'u', ],
            'w' => [0 => 'w', 1 => 'x', 2 => 'y', 3 => 'z', 4 => 'a', 5 => 'b', 6 => 'c', 7 => 'd', 8 => 'e', 9 => 'f', 10 => 'g', 11 => 'h', 12 => 'i', 13 => 'j', 14 => 'k', 15 => 'l', 16 => 'm', 17 => 'n', 18 => 'o', 19 => 'p', 20 => 'q', 21 => 'r', 22 => 's', 23 => 't', 24 => 'u', 25 => 'v', ],
            'x' => [0 => 'x', 1 => 'y', 2 => 'z', 3 => 'a', 4 => 'b', 5 => 'c', 6 => 'd', 7 => 'e', 8 => 'f', 9 => 'g', 10 => 'h', 11 => 'i', 12 => 'j', 13 => 'k', 14 => 'l', 15 => 'm', 16 => 'n', 17 => 'o', 18 => 'p', 19 => 'q', 20 => 'r', 21 => 's', 22 => 't', 23 => 'u', 24 => 'v', 25 => 'w', ],
            'y' => [0 => 'y', 1 => 'z', 2 => 'a', 3 => 'b', 4 => 'c', 5 => 'd', 6 => 'e', 7 => 'f', 8 => 'g', 9 => 'h', 10 => 'i', 11 => 'j', 12 => 'k', 13 => 'l', 14 => 'm', 15 => 'n', 16 => 'o', 17 => 'p', 18 => 'q', 19 => 'r', 20 => 's', 21 => 't', 22 => 'u', 23 => 'v', 24 => 'w', 25 => 'x', ],
            'z' => [0 => 'z', 1 => 'a', 2 => 'b', 3 => 'c', 4 => 'd', 5 => 'e', 6 => 'f', 7 => 'g', 8 => 'h', 9 => 'i', 10 => 'j', 11 => 'k', 12 => 'l', 13 => 'm', 14 => 'n', 15 => 'o', 16 => 'p', 17 => 'q', 18 => 'r', 19 => 's', 20 => 't', 21 => 'u', 22 => 'v', 23 => 'w', 24 => 'x', 25 => 'y', ],
        ];
        $total = count($shifts) - 1;
        $sum = 0;
        $str = "";
        for ($i=$total; $i >= 0; $i--) {
            $sum += $shifts[$i];
            $sum = $sum % 26;
            $map[$i] = $sum;
            $c = $S[$i];
            $str = $map[$c][$sum].$str;
        }
        return $str;
    }
}
