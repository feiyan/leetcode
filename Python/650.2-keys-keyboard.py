
class Solution(object):
    def minSteps(self, n):
        """
        :type n: int
        :rtype: int
        """
        steps = 0
        while True:
            non_division = True
            for i in range(int(n/2), 0, -1):
                if n % i == 0:
                    non_division = False
                    steps += (n/i)
                    n = i
                    break
            if non_division:
                return steps