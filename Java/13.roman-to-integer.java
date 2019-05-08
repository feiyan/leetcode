/**
 * @url https://leetcode.com/problems/roman-to-integer/
 * @param {number} n
 * @return {number}
 */
class Solution {
    //第一版比较简单的实现
    public int romanToInt(String s) {
        Map<Character, Integer> map = new HashMap<Character, Integer>();
        map.put('I', 1);
        map.put('V', 5);
        map.put('X', 10);
        map.put('L', 50);
        map.put('C', 100);
        map.put('D', 500);
        map.put('M', 1000);
        
        char prev = s.charAt(0);
        int prevNum = map.get(prev);
        int total = prevNum;
        for (int i=1; i<s.length(); i++) {
            char curr = s.charAt(i);
            int currNum = map.get(curr);
            total += currNum;
            if (currNum > prevNum) {
                total -= prevNum * 2;
            }
            prevNum = currNum;
        }
        return total;
    }
}
