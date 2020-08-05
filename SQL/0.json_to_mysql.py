#!/usr/bin/python3
# coding=utf-8

import json
import pymysql
from pymysql.cursors import DictCursor

class dbtool():
    """
    # 一个简单的MySQL方法
    """
    conn = None
    cursor = None

    def __init__(self, *args, **kwargs):
        self.connect()

    def connect(self):
        if not self.conn:
            self.conn = pymysql.connect(
                host='localhost',
                user='root',
                passwd='develop',
                db='test',
                charset='utf8mb4'
            )
        if not self.cursor:
            self.cursor = self.conn.cursor(DictCursor)
            sql = "SET NAMES utf8;"
            self.cursor.execute(sql)
        return

    def __del__(self):
        if self.cursor:
            self.cursor.close()
        if self.cursor:
            self.conn.close()

def json_to_mysql():
    """
    : 解析Header Json文件构造MySQL数据表
    """
    file = 'header.json'
    with open(file, 'r') as fp:
        db = dbtool()
        arr = json.load(fp)

        if 'headers' not in arr:
            return
        for table, columns in arr['headers'].items():
            # 删除可能存在的数据表
            sql = "DROP TABLE IF EXISTS `{}`;".format(table)
            db.cursor.execute(sql)
            db.conn.commit()

            # 创建数据表
            values = None
            if 'rows' in arr and table in arr['rows'] and arr['rows'][table]:
                values = arr['rows'][table]
            sql = get_table(table, columns, values)
            db.cursor.execute(sql)
            db.conn.commit()

            # 写入数据
            if values is not None:
                sql = get_values(table, columns, values)
                db.cursor.execute(sql)
                db.conn.commit()

def get_table(table, columns, values=[]):
    """
    :param table:
    :param columns:
    :param values:
    :return string:
    """
    if not values:
        # 当不存在value时，默认都为string类型
        values = ["str" for i in range(len(columns))]
    else:
        values = values[0]
    sql = "CREATE TABLE IF NOT EXISTS `{}` (\n".format(table)
    for idx, key in enumerate(columns):
        val = values[idx]
        column_type = "INT(10) UNSIGNED DEFAULT 0" if isinstance(val, int) else "VARCHAR(255) DEFAULT ''"
        sql += "`{}` {} NOT NULL,\n".format(key, column_type)
    sql += "PRIMARY KEY (`{}`)".format(columns[0])
    sql += ") ENGINE=InnoDB DEFAULT CHARSET=utf8;\n"
    return sql

def get_values(table, columns, values):
    """
    :param table:
    :param columns:
    :param values:
    :return string:
    """
    data = []
    for vals in values:
        data.append("(" + ", ".join("'%s'" % val for val in vals) + ")")
    sql = "INSERT INTO `{}`({}) VALUES{};\n".format(table, ", ".join(columns), ", ".join(data))
    return sql

if __name__ == '__main__':
    json_to_mysql()
