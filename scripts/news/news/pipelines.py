# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: https://docs.scrapy.org/en/latest/topics/item-pipeline.html


# useful for handling different item types with a single interface
import mysql.connector
import sys
from mysql.connector import errorcode
from itemadapter import ItemAdapter
from scrapy import item


class NewsPipeline:
    def __init__(self):
        self.create_connection()

    def create_connection(self):
        self.conn = mysql.connector.connect(
            host = 'localhost',
            user = 'notcoderguy',
            password = '#Bhulgaya1',
            database = 'newsondemand'
        )
        self.curr = self.conn.cursor()
    
    def store_db(self, item):     
        try:
            self.curr.execute("""INSERT INTO news (title, published, image, highlight, article, keyword, twitter_title, twitter_description, url, category, publisher, created_at, updated_at) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) """, (
                item['title'][0],
                item['published'][0],
                item['image'][0],
                item['highlight'][0],
                item['article'],
                item['keyword'][0],
                item['twitter_title'][0],
                item['twitter_description'][0],
                item['url'],
                item['category'][3],
                item['publisher'],
                item['timestamp'],
                item['timestamp']                
            ))
            self.conn.commit()
        except mysql.connector.Error as e:
            print(f"ERROR : {e}")
            sys.exit(1)

    def process_item(self, item, spider):
        self.store_db(item)
        return item
