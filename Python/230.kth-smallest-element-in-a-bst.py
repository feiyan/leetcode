# 
# 二叉树中的中序遍历
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right
# 

class Solution:
    def kthSmallest(self, root: TreeNode, k: int) -> int:
        tree_elements = []
        stack = []
        node = root
        while node or stack:
            if node:
                stack.append(node)
                node = node.left
            else:
                node = stack.pop()
                tree_elements.append(node.val)
                if len(tree_elements) == k:
                    return node.val
                node = node.right
        return 0
