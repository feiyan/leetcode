
-- 解法1：读取奇数位置和偶数位置后，合并到原表。

SELECT IFNULL(y.id, x.id) AS id, IFNULL(y.student, x.student) AS student
FROM seat AS x 
LEFT JOIN (
    SELECT a.id, b.student
    FROM seat AS a 
    INNER JOIN seat AS b 
    WHERE a.id+1=b.id AND a.id%2=1
    UNION
	 SELECT a.id, b.student
    FROM seat AS a 
    INNER JOIN seat AS b 
    WHERE a.id-1=b.id AND a.id%2=0
) AS y ON x.id=y.id
ORDER BY x.id ASC;

-- 解法2： 判断ID的位置然后进行ID的加减。
SELECT IF(id%2=0, id-1, IF(id=@total, id, id+1)) AS id, student
FROM seat, (SELECT @total:=COUNT(id) FROM seat) AS t
ORDER BY id ASC;
