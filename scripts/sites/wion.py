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
    def get_final_data(self, about):
        data = self.make_requests(f"https://www.wionews.com/{about}")
        final_data = []

        # Get Latest Number of Articles
        inner_data = data.find_all('div', {"class":"list-holder"})

        # Loop articles in the main category page
        for all in range (len(inner_data)):
            try:
                # Get link to article
                link = inner_data[all].find('div', {"class":"content-holder"}).find('a', href=True)['href']
                print(link)
            except Exception as e:
                continue

            try:
                # Get tags from the article
                short_desc = inner_data[all].find('div', {"class":"content-holder"}).find('p').get_text()
                print(short_desc)                
            except Exception as e:
                short_desc = ""
                

            try:
                # Get Display image on mainpage
                img_placeholder = inner_data[all].find('div', {"class":"img-place-holder"}).find('img')['src']
                print(img_placeholder)
            except Exception as e:
                img_placeholder = ""
                

            try:
                # Get Date and Time
                venue = inner_data[all].find('div', {"class":"date-author-loc"}).find('li').get_text()
                print(venue)
            except Exception as e:
                venue = ""
                

            try:
                # Get main Article Text
                article = self.get_article(f'https://www.wionews.com{link}')
                print(article)
            except Exception as e:
                continue

            try:
                # Get HTML Content
                markup_data = self.make_requests(f'https://www.wionews.com{link}')
                # print(markup_data)
            except Exception as e:
                continue

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
                

                # keywords = keywords.replace(',', '')
                # keywords = keywords.replace("'", '')
                # keywords = keywords.replace(' ', '%20')
                
            json_ = {
                "link": link,
                "twitter_title": twitter_title,
                "twitter_desc" : twitter_desc,
                "twitter_img"  : twitter_img,
                "keyword": keywords,
                "title": twitter_title,
                "short_desc": short_desc,
                "img_placeholder": img_placeholder,
                "article_img": article_img,
                "date": venue,
                "story_highlights": story_high,
                "article": article,
                "language": "en",
                "publisher": "wion",
                "category": about
            }
            # print(json_)
            final_data.append(json_)
        return final_data