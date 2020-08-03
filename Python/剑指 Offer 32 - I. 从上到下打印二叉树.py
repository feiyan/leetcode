#
#  前序遍历里面是叶子节点取出后放在栈顶（先进先出），这个则放到栈底（先进后出）。
#
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, x):
#         self.val = x
#         self.left = None
#         self.right = None

class Solution:
    def levelOrder(self, root: TreeNode) -> List[int]:
        trees = []
        if root is not None:
            stack = []
            stack.append(root)
            while stack:
                node = stack.pop()
                trees.append(node.val)
                if node.left is not None:
                    stack.insert(0, node.left)
                if node.right is not None:
                    stack.insert(0, node.right)
        return trees