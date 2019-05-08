/**
 * @desc 
 * @url https://leetcode.com/problems/single-number/
 */
class Solution {
    public int singleNumber(int[] nums) {
        int ret = 0;
        for (int num : nums) {
            ret ^= num;
        }
        return ret;
    }
}

/**
位运算
& 当都为1时返回1，其他为0；
| 当任一为1时返回1，其他为0；
^ 按位异或，不同时返回1，相同返回0；
*/