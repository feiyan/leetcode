# 
# 尾插入法
# Definition for singly-linked list.
# class ListNode:
#     def __init__(self, x):
#         self.val = x
#         self.next = None

class Solution:
    def partition(self, head: ListNode, x: int) -> ListNode:
        left = []
        right = []
        while head is not None:
            node = head
            if node.val < x:
                left.append(node)
            else:
                right.append(node)
            head = head.next
        left.extend(right)
        link_list = left[0]
        link_list.next = None
        for i in range(1, len(left)):
            node = left[i]
            node.next = link_list.next
            link_list.next = node
        return link_list