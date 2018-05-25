# Url: https://leetcode.com/problems/nth-highest-salary
# Difficulty: Medium
# Desc: Use MySQL Function

CREATE FUNCTION getNthHighestSalary(N INT) RETURNS INT
BEGIN
  DECLARE M INTEGER DEFAULT 0;
  SET M = N-1;
  RETURN (
      # Write your MySQL query statement below.
      SELECT DISTINCT Salary FROM Employee ORDER BY Salary DESC LIMIT M, 1
  );
END