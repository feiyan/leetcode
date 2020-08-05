
-- 找出每哥部门最高的工资，然后根据再和Employee进行匹配。

SELECT t.Department, e.`Name` AS Employee, t.Salary
FROM Employee AS e
    INNER JOIN (
        SELECT e.DepartmentId AS DepartmentId, d.`Name` AS Department, MAX(e.Salary) AS Salary
        FROM Employee AS e
        INNER JOIN Department AS d ON e.DepartmentId = d.Id
        GROUP BY e.DepartmentId
    ) AS t ON e.DepartmentId=t.DepartmentId AND e.Salary = t.Salary