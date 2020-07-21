
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Solution:
    def rangeSumBST(self, root: TreeNode, L: int, R: int) -> int:
        total = 0
        queen = []
        queen.append(root)
        while queen:
            node = queen.pop(0)
            if node.val and node.val >= L and node.val <= R:
                total += node.val
            if node.left is not None:
                queen.append(node.left)
            if node.right is not None:
                queen.append(node.right)
        return total
