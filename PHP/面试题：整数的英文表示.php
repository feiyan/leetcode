<?php

class Solution {

    /**
     * @param Integer $num
     * @return String
     */

    function numberToWordsByLen($num) {
        if ($num == 0) {
            return "Zero";
        }
        $len = strlen($num);
        $arr = str_split(strrev($num), 3);
        $txt = [];
        $rangeMap = [
            3   => ' Billion',
            2   => ' Million',
            1   => ' Thousand',
            0   => '',
        ];
        foreach ($arr as $k=>$substr) {
            if ($k > 3) {
                break;
            }
            $n = intval(strrev($substr));
            if ($n == 0) {
                continue;
            }
            array_unshift($txt, $this->hundredToWords($n) . $rangeMap[$k]);
        }
        return implode(" ", $txt);
    }

    function numberToWordsByCount($num) {
        if ($num == 0) {
            return "Zero";
        }
        $txtMap = [];
        $rangeMap = [
            1000000000  => 'Billion',
            1000000     => 'Million',
            1000        => 'Thousand',
        ];
        foreach ($rangeMap as $k=>$v) {
            if ($num >= $k) {
                $ys = $num % $k;
                $cs = ($num - $ys) / $k;
                $txtMap[] = $this->hundredToWords($cs) . " " . $v;
                $num = $ys;
                if ($num == 0) {
                    break;
                }
            }
        }
        if ($num) {
            $txtMap[] = $this->hundredToWords($num);
        }
        return implode(" ", $txtMap);
    }

    function hundredToWords($num) {
        $numMap = [
            1   => 'One',
            2   => 'Two',
            3   => 'Three',
            4   => 'Four',
            5   => 'Five',
            6   => 'Six',
            7   => 'Seven',
            8   => 'Eight',
            9   => 'Nine',
            10  => 'Ten',
            11  => 'Eleven',
            12  => 'Twelve',
            13  => 'Thirteen',
            14  => 'Fourteen',
            15  => 'Fifteen',
            16  => 'Sixteen',
            17  => 'Seventeen',
            18  => 'Eighteen',
            19  => 'Nineteen',
            20  => 'Twenty',
            30  => 'Thirty',
            40  => 'Forty',
            50  => 'Fifty',
            60  => 'Sixty',
            70  => 'Seventy',
            80  => 'Eighty',
            90  => 'Ninety',
            100 => 'Hundred',
        ];
        $arr = [];
        if ($num >= 100) {
            $ys = $num % 100;
            $cs = ($num - $ys) / 100;
            $arr[] = $numMap[$cs] . " Hundred";
            $num = $ys;
        }
        if ($num >= 20) {
            $ys = $num % 10;
            $cs = $num - $ys;
            $arr[] = $numMap[$cs];
            if ($ys > 0) {
                $arr[] = $numMap[$ys];
            }
        } elseif ($num > 0) {
            $arr[] = $numMap[$num];
        }
        return implode(" ", $arr);
    }
}
