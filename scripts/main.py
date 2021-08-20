from enum import unique
from re import A
import pymongo
import json
from pymongo import MongoClient
from sites.wion import news as news
import time
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

    # Delete all data in MongoDB
    def delete_all_data(self, database, table):
        db = self.cluster[database]
        collection = db[table]

        collection.delete_many({})

        print("Dropped all data in DB!!✅ ", table)

    # Count number of Articles in the MongoDB
    def count(self, database, table):
        db = self.cluster[database]
        collection = db[table]

        return collection.count_documents({})

if __name__ == "__main__":
    
    # Tables in MongoDB (I think should be added through config.json for site variation.)
    # subtopic = [ 
    #         'olympics',
    #         'world',
    #         'india',
    #         'sports',
    #         'entertainment',
    #         'science'
    #          ]
    with open('config.json') as f:
        data = json.load(f)
    subtopic = data['wion']
    mon, n = mongo(), news()
    database = 'newsondemand'
    

    for cat in subtopic:
        
        # count = mon.count(database, cat)
        # if count > 100:
        # mon.delete_all_data(database, cat)

        data = n.get_final_data(cat)
        mon.insert_data(database, 'articles', data)