import mysql.connector
import time
import re
import os
import requests
import urllib.request
import sys

image_path = "/var/www/newsondemand/public/img/news/"

def get_db_connection():
    return mysql.connector.connect(
        host="localhost",
        user="ncg",
        passwd="#Bhulgaya1",
        database="newsondemand"
    )

def download_image(url, image_name):
    with open(image_name, "wb") as file:
        response = requests.get(url)
        file.write(response.content)

def get_image_urls():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT image, title FROM news")
    return cursor.fetchall()

def get_image_extension_from_url(url):
    return url.split(".")[-1]

def get_image_name(title, extension):
    title_mod = re.sub(r"[^a-zA-Z0-9]", " ", title)
    title_mod = ' '.join(title_mod.split())

    date = get_time_of_post(title)
    day = date.day        
    month = date.month      
    year = date.year

    dir = image_path + str(year) + "/" + str(month) + "/" + str(day) + "/"
    if os.path.isdir(dir):
        return dir + title_mod.replace(' ', '-').lower() + "." + extension
    else:
        os.makedirs(dir)
        return dir + title_mod.replace(' ', '-').lower() + "." + extension

    return dir + title_mod.replace(' ', '-').lower() + "." + extension

def fix_image_url(image_url):
    return "https:" + image_url

def check_if_image_exists(image_name):
    return os.path.isfile(image_name)

def get_time_of_post(title):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT created_at FROM news WHERE title = %s", (title,))
    return cursor.fetchone()[0]

def download_images():
    for image_url, title in get_image_urls():
        if not check_if_image_exists(get_image_name(title, get_image_extension_from_url(image_url))):
            print("Downloading image: " + get_image_name(title, get_image_extension_from_url(image_url)))
            download_image(fix_image_url(image_url), get_image_name(title, get_image_extension_from_url(image_url)))
        else:
            print("Image already exists: " + get_image_name(title, get_image_extension_from_url(image_url)))

def get_image_status():
    cdn_source = 'https://cdn.newsondemand.in/img/news/'

    for image_url, title in get_image_urls():

        title_mod = re.sub(r"[^a-zA-Z0-9]", " ", title)
        title_mod = ' '.join(title_mod.split())

        date = get_time_of_post(title)
        day = date.day        
        month = date.month      
        year = date.year

        verify_url = cdn_source + str(year) + "/" + str(month) + "/" + str(day) + "/" + title_mod.replace(' ', '-').lower() + "." + get_image_extension_from_url(image_url)

        if current_image_status(title)[0][0] == 0 or current_image_status(title)[0][0] == None:
            code = requests.head(verify_url).status_code
            if code == 200:
                print("Image exists: " + verify_url)
                update_image_status(title)
            else:
                print("Image does not exist: " + verify_url)
        
        else:
            print("Image already exists: " + verify_url)


def update_image_status(title):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("UPDATE news SET cdn_image = 1 WHERE title = %s", (title,))
    conn.commit()

def current_image_status(title):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("SELECT cdn_image, title FROM news WHERE title = %s", (title,))
    return cursor.fetchall()

#get_image_status()
#download_images()

if sys.argv[1] == "download":
    download_images()
elif sys.argv[1] == "update":
    get_image_status()
else:
    print("Invalid argument")