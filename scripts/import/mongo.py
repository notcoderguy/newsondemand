import json
import time
from scrape import news as news
import pymongo
from pymongo import MongoClient
from enum import unique
from re import A
from bson.objectid import ObjectId

class mongo():

    # MongoDB Connection loclhost
    cluster = MongoClient('mongodb://localhost:27017/?readPreference=primary&directConnection=true&ssl=false&retryWrites=true&w=majority')
    
    # Insert data in MongoDB
    def insert_data(self, database, table, data):
        db = self.cluster[database]
        collection = db[table] 
        for d in data:
            collection.insert_one(d)
        sort = {'_id':1}
        collection.find().sort('_id', pymongo.ASCENDING)
        print("Inserted !!✅ ", table)

        # Delete Duplicate Data in MongoDB
        for all in collection.find({}):
            count = 0
            for check in collection.find({}):
                if check['link'] == all['link']:
                    count += 1
                    print(check['_id'])
                    print(all['_id'])
                    delete_id = check['_id']
            print(count)
            if count > 1:
                collection.delete_one({'_id': ObjectId(delete_id)})
                print("Duplicate detected and Deleted !!✅ ", table, ObjectId(delete_id))