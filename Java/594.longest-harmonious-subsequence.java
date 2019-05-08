
/**
 * @desc 返回组大子集
 * @url https://leetcode.com/problems/longest-harmonious-subsequence/submissions/
 */
class Solution {
    public int findLHS(int[] nums) {
        if (nums.length <= 1) {
			return 0;
		}
		TreeSet<Integer> ts = new TreeSet<Integer>();
		Map<Integer, Integer> map = new TreeMap<Integer, Integer>();
		for (int num : nums) {
			int val = 1;
			if (map.containsKey(num)) {
				val += map.get(num);
			}
			map.put(num, val);
		}
		int prevKey = 0;
		int prevVal = 0;
		int i = 0;
		for (Map.Entry<Integer, Integer> entry : map.entrySet()) {
			int currKey = entry.getKey();
			int currVal = entry.getValue();
			if (i > 0) {
				if (Math.abs(currKey - prevKey) == 1) {
					ts.add(prevVal + currVal);
				}
			}
			i ++;
			prevKey = currKey;
			prevVal = currVal;
		}
        return ts.size() > 0 ? ts.last() : 0;
    }
}