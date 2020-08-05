-- Url: https://leetcode-cn.com/problems/combine-two-tables/
-- Difficulty: Easy
-- Desc: LEFT JOIN，不管右侧是否有数据，总是返回左侧表数据

SELECT
    p.FirstName, p.LastName, a.City, a.State
FROM Person AS p
    LEFT JOIN Address AS a ON p.PersonId = a.PersonId