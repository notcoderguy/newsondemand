import scrapy
import json
import time
import datetime
import mysql.connector
from scrapy.http.response import text
from scrapy.crawler import CrawlerProcess
from urllib.parse import urlparse, urljoin
from ..items import NewsItem

class WionSpider(scrapy.Spider):

    container = NewsItem()
    name = 'wion'

    cat_file = open('categories.json')
    cat_data = json.load(cat_file)

    start_urls = []

    for data in cat_data[name]:
        start_urls.append("https://www.wionews.com/" + data)

    def extract(self, response):
        self.container['title'] = response.css("h1::text").extract()
        self.container['published'] = response.css("span+ span::text").extract()
        self.container['image'] = response.css(".article-main-img .img-responsive::attr(src)").extract()
        self.container['highlight'] = response.css(".story-highlight-data p::text").extract()

        # Get Article in String Format with new line character
        article = response.css(".article-main-data p").extract()
        self.container['article'] = "".join(article)        
        self.container['keyword'] = response.xpath("//meta[@name='keywords']/@content").extract()
        self.container['twitter_title'] = response.xpath("//meta[@name='twitter:title']/@content").extract()
        self.container['twitter_description'] = response.xpath("//meta[@name='twitter:description']/@content").extract()
        self.container['publisher'] = "wion"
        self.container['url'] = response.url

        # Get Category from URL
        self.container['category'] = self.container['url'].split("/")

        # Get Current Timestamp
        ts = time.time()
        self.container['timestamp'] = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')

        yield self.container

    def parse(self, response):
        old_links = response.css('.col-sm-8 h2 a').xpath('@href').extract()
        for i in old_links:
            yield response.follow("https://www.wionews.com"+i, callback = self.extract)

if __name__ == "__main__":
    process = CrawlerProcess({
        # "LOG_LEVEL":"ERROR"
    })
    process.crawl(WionSpider)
    process.start()