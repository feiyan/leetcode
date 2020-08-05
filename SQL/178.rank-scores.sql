
-- 通过临时表去判断获取每个分数的位置

SELECT s.Score, CAST(b.idx AS SIGNED) AS `Rank`
FROM scores AS s INNER JOIN (
    SELECT  @i:=@i+1 AS idx, a.Score FROM (
        SELECT Score, @i:=0 FROM scores GROUP BY Score ORDER BY Score DESC
    ) AS a
) AS b ON s.Score=b.Score
ORDER BY s.Score DESC

-- 其他人的解法，貌似比上面的慢

SELECT
    a.Score as score , 
    (SELECT COUNT(DISTINCT b.Score) FROM Scores b where b.Score >=a.Score) AS `rank`
FROM Scores a ORDER BY Score DESC

