# Given a Weather table, write a SQL query to find all dates' Ids with higher temperature compared to its previous (yesterday's) dates.
# use DATE_SUB function to find the second last day
SELECT t1.Id
FROM weather AS t1, weather AS t2
WHERE t1.Temperature>t2.Temperature AND t2.RecordDate=DATE_SUB(t1.RecordDate, INTERVAL 1 DAY)