import csv
import datetime
import urllib.parse
from urllib.request import urlopen
from urllib.error import HTTPError, URLError
from  bs4 import BeautifulSoup
from dateutil.relativedelta import relativedelta
import requests
import pymysql

#放入資料庫函式
def putindb(number,date,fall):
    db = pymysql.connect(host="3.92.133.135",user="databaseaws",password="databaseaws",database="reservoir_project")
    cursor = db.cursor()
    try:
        cursor.execute("INSERT INTO rainfall(number,date,today_rainfall) \
        VALUES ('%s', '%s', '%s')" % \
        (number,date,fall))
        db.commit()
        print("put in successfully")
    except Exception as e:
        db.rollback()
        print(e)

    db.close()    

#讀取測站資料
f=open("station.csv","r",encoding= "UTF-8")
Num=[]
Name=[]
times=0
n=0
i=0
stations=f.readlines()

dt=datetime.datetime.today()
fulldate=dt.date()
date=fulldate.strftime("%d")
i=int(date)-1   #抓取今天日期-1


#可寫入一個csv檔案檢查(本是寫2004~2020的歷史資料所用)
#f=open("example.csv","w",encoding="utf-8",newline="")          
#writer = csv.writer(f)
for station in stations:
    list1=station.split(',')#利用,分割測站編號、名稱
    Num.append(list1[0])
    Name.append(list1[1])
    #stname=urllib.parse.quote(urllib.parse.quote(Name[n])) #網址有失效的狀況，因此改成只抓取編號，若有需要更改，urllist的網址中stname加上stname變數

    #裝入陣列
    name = Name[n]
    stnum = Num[n]
    dateString = fulldate.strftime("%Y-%m")
    urllist="https://e-service.cwb.gov.tw/HistoryDataQuery/MonthDataController.do?command=viewMain&station="+stnum+"&stname=&datepicker="+dateString
    #開啟網站
    while 1:
        try:
            html = urlopen(urllist,timeout=5).read()
            break
        except HTTPError as e:
            print(e)
        except URLError as e:
            print(e)
        except Exception as e:
            print(e)
    #解析網站並抓取table
    soup = BeautifulSoup(html, "html.parser")
    table = soup.findAll("table",id="MyTable")[0]
    rows = table.findAll("tr") 
    #找到與找不到資料的狀況
    try:
        cols = rows[i+2].findAll("td")  #+2是根據網頁的td資料(第三個td才是第一筆資料處)
        rainfall=cols[21].get_text().strip()#找降雨量的欄位
        rainfall=str(rainfall)
        #判斷資料並改寫
        if rainfall =='T':
            rainfall='0.1'
        elif rainfall=='...':
            rainfall='0.0'
        else:
            rainfall=rainfall
        csv_row = dateString+'-'+cols[0].get_text()        
        putindb(stnum,csv_row,rainfall)
        print(name,dateString+'-'+cols[0].get_text(),rainfall)       
        #ary=[stnum,name,csv_row,rainfall]
        #writer.writerow(ary)    
    except:
        if(i<10):
            csv_row = dateString+"-"+'0'+str(i)
        csv_row = dateString+'-'+str(i)       
        putindb(stnum,csv_row,0.0)
        print(stnum,csv_row,0.0)    
        #ary=[stnum,name,csv_row,0.0]
        #writer.writerow(ary)

    #換下個測站與計算跑過的測站數
    n=n+1
    times+=1
    print("目前已放測站:",times)
