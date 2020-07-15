
class Solution(object):
    def reverseParentheses(self, s):
        """
        :type s: str
        :rtype: str
        :desc: 第二次根据括号考虑栈，通过
        """
        s = s.replace('()', '')
        groups = {}
        group_index = 0
        brackets = []
        prev = '('
        for idx, c in enumerate(s):
            if c == '(':
                brackets.append(idx)
                if prev == ')':
                    group_index += 1
                    prev = '('
            if c == ')':
                prev = ')'
                left_idx = brackets.pop()
                if group_index not in groups:
                    groups[group_index] = {}
                groups[group_index][left_idx] = idx

        for group in groups.values():
            for start in sorted(group, reverse=True):
                end = group[start]
                start += 1
                substr = s[start:end]
                s = s[:start] + substr[::-1] + s[end:]
        return s.replace('(', '').replace(')', '')

    def reverseParentheses_first(self, nums1: List[int], nums2: List[int]) -> List[int]:
        """
        :type s: str
        :rtype: str
        :desc: 第一次虽然考虑到用栈，但是没有考虑全面，通过case：19/37.
        """
        arr = []
        sarr = s.split('(')
        for i in sarr[:-1]:
            arr.append(i)
        for i in sarr[len(sarr) - 1].split(')'):
            arr.append(i)
        lst = []
        total = len(arr)
        mid = (total+1)/2
        for i in range(total):
            if i % 2 == 0:
                lst.append(arr[i])
            else:
                if i < mid:
                    temp = arr[total - 1 - i]
                    arr[total - 1 - i] = arr[i]
                    arr[i] = temp
                lst.append(arr[i][::-1])

        return "".join(lst)
        pass
