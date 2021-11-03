# Define here the models for your scraped items
#
# See documentation in:
# https://docs.scrapy.org/en/latest/topics/items.html

import scrapy


class NewsItem(scrapy.Item):
    # define the fields for your item here like:
    title = scrapy.Field()
    published = scrapy.Field()
    image = scrapy.Field()
    highlight = scrapy.Field()
    article = scrapy.Field()
    keyword = scrapy.Field()
    twitter_title = scrapy.Field()
    twitter_description = scrapy.Field()
    url = scrapy.Field()
    category = scrapy.Field()
    publisher = scrapy.Field()
    timestamp = scrapy.Field()

