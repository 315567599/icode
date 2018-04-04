#-*- coding: UTF-8 -*-

import sys
import time
import urllib
import urllib2
import requests
import numpy as np
import MySQLdb
from bs4 import BeautifulSoup


reload(sys)
sys.setdefaultencoding('utf-8')


def insert(house):
    conn=MySQLdb.connect(host='localhost',port=3109,user='root',passwd='',db='sh_beenest',charset='utf8')
    cur=conn.cursor()
    cur.execute("SET NAMES utf8")
    cur.execute("insert into lianjia(title, price, area, unitPrice,community, href) values('%s','%s','%s','%s','%s','%s')" % (house['title'], house['price'], house['area'], house['unitPrice'], house['community'], house['href']))
    conn.commit()
    cur.close()
    conn.close()

#user agents
hds=[{'User-Agent':'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.6) Gecko/20091201 Firefox/3.5.6'},\
    {'User-Agent':'Mozilla/5.0 (Windows NT 6.2) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.12 Safari/535.11'},\
    {'User-Agent':'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)'},\
    {'User-Agent':'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:34.0) Gecko/20100101 Firefox/34.0'},\
    {'User-Agent':'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/44.0.2403.89 Chrome/44.0.2403.89 Safari/537.36'},\
    {'User-Agent':'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_8; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50'},\
    {'User-Agent':'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-us) AppleWebKit/534.50 (KHTML, like Gecko) Version/5.1 Safari/534.50'},\
    {'User-Agent':'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0'},\
    {'User-Agent':'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.6; rv:2.0.1) Gecko/20100101 Firefox/4.0.1'},\
    {'User-Agent':'Mozilla/5.0 (Windows NT 6.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1'},\
    {'User-Agent':'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_0) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.56 Safari/535.11'},\
    {'User-Agent':'Opera/9.80 (Macintosh; Intel Mac OS X 10.6.8; U; en) Presto/2.8.131 Version/11.11'},\
    {'User-Agent':'Opera/9.80 (Windows NT 6.1; U; en) Presto/2.8.131 Version/11.11'}]


#city
citys = ['sh', 'bj']

# 生成房源列表页url
def generate_list(city='sh', pages=101):
    urls = []
    for i in range(1, pages):
        page = u"https://{0}.lianjia.com/ershoufang/pg{1}/".format(city, i)    
        urls.append(page)
    return urls

# 抓取房源列表页房源详情url
def spider_ershoufang_url(list_url):
    try:
        req = urllib2.Request(list_url, headers=hds[10%len(hds)])
        print('Fetching list %s' % (url))
        source_code = urllib2.urlopen(req).read()
        plain_text=str(source_code)   
    except (urllib2.HTTPError, urllib2.URLError), e:
        print e

    soup = BeautifulSoup(plain_text)
    list_soup = soup.find('ul', {'class': 'sellListContent'})
    if list_soup == None or len(list_soup) <=1: 
        return []
    for ershoufang in list_soup.findAll('li'):
        title = ershoufang.find('div',{'class':'title'}).find('a').string.strip()
        href = ershoufang.find('div',{'class':'title'}).find('a').get('href')
        print('---------------------------------------')
        print('title:%s url:%s' % (title,href))
        try:
            house = spider_ershoufang(href)
            house['title'] = title
            house['href'] = href
            print(house)
            insert(house)
        except:
            continue

# 抓取房源详情
def spider_ershoufang(url):
    #time.sleep(1)
    house = {}
    try:
        req = urllib2.Request(url, headers=hds[10%len(hds)])
        source_code = urllib2.urlopen(req).read()
        plain_text=str(source_code)   
    except (urllib2.HTTPError, urllib2.URLError), e:
        print e

    soup = BeautifulSoup(plain_text)
    
    price = soup.find('span', {'class':'total'}).string
    unitPrice = soup.find('span', {'class':'unitPriceValue'}).contents[0]
    area = soup.find('div', {'class':'houseInfo'}).find('div',{'class':'area'}).find('div',{'class':'mainInfo'}).string 
    community = soup.find('div', {'class':'communityName'}).find('a').string
    house['price'] = price
    house['unitPrice'] = unitPrice
    house['area'] = area
    house['community'] = community
    print('%s %s %s %s' % (price, unitPrice, area, community))
    return house

if __name__ == '__main__':
    urls = generate_list() 
    print(urls)
    for url in urls:
        spider_ershoufang_url(url)


    
