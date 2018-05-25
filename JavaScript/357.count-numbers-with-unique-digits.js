/**
 * @url https://leetcode.com/problems/count-numbers-with-unique-digits
 * @param {number} n
 * @return {number}
 */
var countNumbersWithUniqueDigits = function(n) {
    var total = 0;
    if( n>10 ){
        countNumbersWithUniqueDigits(10);
    }
    if( n==0 ){
        return 1;
    }
    if( n>=1 ){
        var total = 9;
        for(var i=9; i>10-n; i--){
            total *= i;  
        }  
        return total + countNumbersWithUniqueDigits(n-1);
    }
};