'''
desc: 给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
1. 使用collection.Counter进行统计后直接对比
2. 对string转为list后进行字母排序
'''

from collections import Counter

class Solution:
	def isAnagram(self, s: str, t: str) -> bool:
        return Counter(s) == Counter(t)

    def groupAnagramsWithSort(self, strs: List[str]) -> List[List[str]]:
        s1 = "".join((lambda x:(x.sort(), x)[1])(list(s)))
        t1 = "".join((lambda x:(x.sort(), x)[1])(list(t)))
        return s1 == t1

