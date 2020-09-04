'''
1. 利用排序的字符串作为键值
'''
class Solution:
    def groupAnagrams(self, strs: List[str]) -> List[List[str]]:
        m = {}
        for sub_str in strs:
            key = "".join((lambda x:(x.sort(), x)[1])(list(sub_str)))
            if key not in m:
                m[key] = []
            m[key] += [sub_str]
        return list(m.values())
