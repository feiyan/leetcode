/**
 * @url https://leetcode.com/problems/count-numbers-with-unique-digits
 * @param {number} n
 * @return {number}
 */
class Solution { 
    public int countNumbersWithUniqueDigits(int n) {
        if(n>10){
            this.countNumbersWithUniqueDigits(10);
        }
        if (n == 0) {
            return 1;
        }
        int total = 9;
        for( int i=9; i>(10-n); i-- ){
            total *= i;
        }
        return total + this.countNumbersWithUniqueDigits(n-1);
    }
}