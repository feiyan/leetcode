
-- 解法1： 暴力2个临时表

SELECT a.Day, ROUND(IFNULL(b.total, 0.00)/a.total, 2) AS 'Cancellation Rate'
FROM (
    SELECT t.Request_at AS Day, COUNT(t.Id) AS total
    FROM trips AS t
    INNER JOIN users AS u ON u.Users_Id=t.Client_Id
    WHERE u.Banned='No' AND t.Request_at BETWEEN '2013-10-01' AND '2013-10-03'
    GROUP BY t.Request_at
) AS a
LEFT JOIN (
    SELECT t.Request_at AS Day, COUNT(t.Id) AS total
    FROM trips AS t
    INNER JOIN users AS u ON u.Users_Id=t.Client_Id
    WHERE
        (t.Status='cancelled_by_driver' OR t.Status='cancelled_by_client')
        AND u.Banned='No'
        AND t.Request_at BETWEEN '2013-10-01' AND '2013-10-03'
    GROUP BY t.Request_at
) AS b ON a.Day=b.Day
