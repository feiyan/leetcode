<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        if (empty($strs)) {
            return [];
        }
        $map = [];
        foreach ($strs as $str) {
            $arr = [];
            for ($i=0; $i < strlen($str); $i++) {
                $arr[] = $str[$i];
            }
            sort($arr);
            $key = implode("", $arr);
            $map[$key][] = $str;
        }
        return array_values($map);
    }
}
