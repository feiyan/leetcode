#!/usr/bin/python3
# coding=utf-8

"""
:没有啥可多说的
"""

class Solution:
    def buildArray(self, target: List[int], n: int) -> List[str]:
        ret = []
        if target:
            m = target[-1]
            for i in range(1, m+1):
                ret.append("Push")
                if i not in target:
                    ret.append("Pop")
        return ret
