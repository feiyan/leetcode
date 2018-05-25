/**
 * @url https://leetcode.com/problems/two-sum
 * @difficulty easy
 * @param {number[]} nums
 * @param {number} target
 * @return {number[]}
 */
var twoSum = function(nums, target) {
	var ret = [];
    var len = nums.length;
    for(var i=0; i<len; i++){
        for(var j=i+1; j<len; j++ ){
            var a = nums[i];
            var b = nums[j];
            if((a+b)==target){
                ret = [i,j];
            }
        }
    }
    return ret;
};