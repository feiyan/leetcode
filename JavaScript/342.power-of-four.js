/**
 * @url https://leetcode.com/problems/power-of-four
 * @param {number} num
 * @return {boolean}
 */
var isPowerOfFour = function(num) {
    return (typeof num!=='number') || num==0 || (num%1!==0) ? false : (num==4 || num==1 ? true : isPowerOfFour(num/4));
};