'''
https://leetcode.com/problems/valid-parentheses
Given a string containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
An input string is valid if:
    Open brackets must be closed by the same type of brackets.
    Open brackets must be closed in the correct order.
'''

class Solution:
    def isValid(self, s):
        lst = []
        for val in s:
            if val == '(' or val == '[' or val == '{':
                lst.append(val)
            elif len(lst) != 0 and (val == ')' or val == ']' or val == '}'):
                prev = lst.pop()
                if prev == '(' and val != ')' or prev == '[' and val != ']' or prev == '{' and val != '}':
                    return False
            else:
                return False
        return len(lst) == 0 and True or False