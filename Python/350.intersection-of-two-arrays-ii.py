import collections as c

class Solution:
    def intersect(self, nums1: List[int], nums2: List[int]) -> List[int]:
        if len(nums1) > len(nums2):
            self.intersect(nums2, nums1)
        hmap = c.Counter(nums1)
        ret = []
        for n in nums2:
            if n in hmap and hmap[n] > 0:
                ret.append(n)
                hmap[n] -= 1
        return ret

    def intersect_first(self, nums1: List[int], nums2: List[int]) -> List[int]:
        if not nums1 or not nums2:
            return []
        n1 = c.Counter(nums1)
        n2 = c.Counter(nums2)
        if len(n1) <= len(n2):
            a = n1
            b = n2
        else:
            a = n2
            b = n1
        ret = []
        for k, v in a.items():
            if k in b:
                ret.extend(k for i in range(min(v, b.get(k))))
        return ret
