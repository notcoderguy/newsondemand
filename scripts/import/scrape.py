import requests, json
from bs4 import BeautifulSoup as bs

class news():

    # Get Data from Site
    def make_requests(self, url):
        data = requests.get(url)
        soup = bs(data.content, 'html.parser')
        return soup

    # Get Main Article Text
    def get_article(self, url):
        data = self.make_requests(url)
        soup = data
        article = []
        for s in soup.select('script'):
            s.extract()
        for all in soup.find('div', {'class': 'article-main-data'}).find_all('p'):
            article.append(all.get_text().strip())
        return article
    
    # Combine and Refine Gathered Data here
    def get_final_data(self, about, category):
        final_data = []
        try:
            link = about.replace('https://www.wionews.com/', '')
            print(link)
        except Exception as e:
            pass

        try:
            # Get main Article Text
            article = self.get_article(str(about))
            print(article)
        except Exception as e:
            article = ""

        try:
            # Get HTML Content
            markup_data = self.make_requests(str(about))
            # print(markup_data)
        except Exception as e:
            pass

        try:
            # Meta tags and Misc
            twitter_title = markup_data.find('meta', {'name':"twitter:title"})['content']
            print(twitter_title)
        except Exception as e:
            twitter_title = ""
            

        try:
            twitter_desc = markup_data.find('meta', {'name': "twitter:description"})['content']
            print(twitter_desc)
        except Exception as e:
            twitter_desc = ""
            

        try:
            twitter_img = markup_data.find('meta', {'name': "twitter:image"})['content']
            print(twitter_img)
        except Exception as e:
            twitter_img = ""
            

        try:
            article_img = markup_data.find('div', {'class': 'img-holder'}).find('img', {'class': "img-responsive"})['src']
            print(article_img)
        except Exception as e:
            article_img = ""
            

        try:
            story_high = markup_data.find('div', {'class': "story_highlights"}).find('p').get_text()
            print(story_high)
        except Exception as e:
            story_high = ""
            

        try:
            keywords = markup_data.find('meta', {'name': "keywords"})['content']
            print(keywords)
        except Exception as e:
            keywords = ""
            
        try:
            temp_venue = markup_data.find('div', {'class': "new-loc-date-stamp"}).find_all('span')
            for get_venue in temp_venue:
                pass
            # venue = temp_venue.text
            # venue = temp_venue[2].get_text().replace('Published: ', '')
            venue = get_venue.text.replace('Published: ', '')
            print(venue)
        except Exception as e:
            venue = ""
            
        json_ = {
            "link": link,
            "twitter_title": twitter_title,
            "twitter_desc" : twitter_desc,
            "twitter_img"  : twitter_img,
            "keyword": keywords,
            "title": twitter_title,
            "article_img": article_img,
            "date": venue,
            "story_highlights": story_high,
            "article": article,
            "language": "en",
            "publisher": "wion",
            "category": category
        }
        # print(json_)
        final_data.append(json_)
        return final_data

n = news()

f = n.get_final_data('https://www.wionews.com/entertainment/box-office-the-suicide-squad-underwhelms-with-265-million-debut-404139', 'entertainment')