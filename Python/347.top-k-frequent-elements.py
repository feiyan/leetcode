'''
Given a non-empty array of integers, return the k most frequent elements.

Example 1:
Input: nums = [1,1,1,2,2,3], k = 2
Output: [1,2]
Example 2:

Input: nums = [1], k = 1
Output: [1]
'''

class Solution:
    def topKFrequent(self, nums, k):
        """
        :type nums: List[int]
        :type k: int
        :rtype: List[int]
        """
        dic = {}
        for num in nums:
            if num in dic:
                dic[num] += 1
            else:
                dic[num] = 1
        
        ## sort by value
        numsSorted = sorted(dic, key=lambda x: dic[x], reverse=True)
        return numsSorted[0:k]

## Test 
obj = Solution()
print(obj.topKFrequent([1, 1, 1, 2, 2, 3, 3, 3, 4, 4, 4, 5, 4], 1))