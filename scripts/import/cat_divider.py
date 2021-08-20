import json
import time
from scrape import news as news
from mongo import mongo as mongo

with open("sitemap.json") as json_file:
    data = json.load(json_file)

data_arr = data['urlset']['url']

cats = ['/entertainment/', '/technology/', '/south-asia/', '/india-news/', '/world/', '/science/', '/sports/', '/gravitas/', '/videos/', '/photos/']

n, mon = news(), mongo()
database = 'newsondemand'

for daone in cats:
    for data in data_arr:
        if daone in data['loc']:
            print(data['loc'])
            final_data = n.get_final_data(data['loc'], daone.lstrip('/').rstrip('/'))
            if final_data[0]['article'] == "":
                continue
            else:
                mon.insert_data(database, 'articles', final_data)
                    