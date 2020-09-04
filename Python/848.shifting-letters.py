'''
desc:尽可能把最大时间复杂度控制到O(n)
'''

from collections import Counter

class Solution:
	class Solution:
    def shiftingLetters(self, S: str, shifts: List[int]) -> str:
        curr = 0
        strs = ""
        for i in range(len(shifts), 0, -1):
            idx = i - 1
            curr += shifts[idx]
            curr = curr % 26
            c = S[idx]
            n = ord(c) + curr
            if n > 122:
                n = n -26
            strs = chr(n) + strs
        return strs

