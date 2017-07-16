Open data
--

Database
---

### store

```sql
+------------------+---------------------+------+-----+-------------------+-------+
| Field            | Type                | Null | Key | Default           | Extra |
+------------------+---------------------+------+-----+-------------------+-------+
| url              | varchar(255)        | NO   | PRI | NULL              |       |
| place_id         | varchar(100)        | YES  |     | NULL              |       |
| lang             | tinyint(1) unsigned | NO   | MUL | 1                 |       |
| title            | varchar(255)        | NO   | MUL | NULL              |       |
| description      | text                | YES  |     | NULL              |       |
| location         | varchar(50)         | YES  |     | NULL              |       |
| lat              | float(10,6)         | YES  |     | 0.000000          |       |
| lng              | float(10,6)         | YES  |     | 0.000000          |       |
| lat_lng          | point               | YES  |     | NULL              |       |
| address          | varchar(255)        | YES  |     | NULL              |       |
| phone            | varchar(100)        | YES  |     | NULL              |       |
| official_url     | varchar(255)        | YES  |     | NULL              |       |
| map_url          | varchar(255)        | YES  |     | NULL              |       |
| office_hours     | varchar(255)        | YES  |     | NULL              |       |
| promo            | varchar(255)        | YES  |     | NULL              |       |
| image_1          | varchar(255)        | YES  |     | NULL              |       |
| image_2          | varchar(255)        | YES  |     | NULL              |       |
| image_3          | varchar(255)        | YES  |     | NULL              |       |
| create_timestamp | datetime            | NO   |     | CURRENT_TIMESTAMP |       |
+------------------+---------------------+------+-----+-------------------+-------+
```

### power

```sql
+------------------+--------------+------+-----+-------------------+-------+
| Field            | Type         | Null | Key | Default           | Extra |
+------------------+--------------+------+-----+-------------------+-------+
| place_id         | varchar(100) | NO   | PRI | NULL              |       |
| title            | varchar(100) | YES  |     | NULL              |       |
| phone            | varchar(100) | YES  |     | NULL              |       |
| location         | varchar(100) | YES  |     | NULL              |       |
| address          | varchar(255) | YES  |     | NULL              |       |
| local            | varchar(50)  | YES  |     | NULL              |       |
| lat              | float(10,6)  | YES  |     | 0.000000          |       |
| lng              | float(10,6)  | YES  |     | 0.000000          |       |
| lat_lng          | point        | YES  |     | NULL              |       |
| office_hours     | varchar(255) | YES  |     | NULL              |       |
| cost             | varchar(50)  | YES  |     | NULL              |       |
| restrict_status  | varchar(100) | YES  |     | NULL              |       |
| image_1          | varchar(255) | YES  |     | NULL              |       |
| create_timestamp | datetime     | NO   |     | CURRENT_TIMESTAMP |       |
+------------------+--------------+------+-----+-------------------+-------+
```
### attractions

```sql
+------------------+---------------------+------+-----+-------------------+-------+
| Field            | Type                | Null | Key | Default           | Extra |
+------------------+---------------------+------+-----+-------------------+-------+
| url              | varchar(255)        | NO   | PRI | NULL              |       |
| place_id         | varchar(100)        | YES  |     | NULL              |       |
| title            | varchar(255)        | NO   | MUL | NULL              |       |
| lang             | tinyint(1) unsigned | NO   | MUL | NULL              |       |
| description      | text                | NO   |     | NULL              |       |
| phone            | varchar(100)        | YES  |     | NULL              |       |
| address          | varchar(255)        | YES  |     | NULL              |       |
| location         | varchar(50)         | YES  |     | NULL              |       |
| lat              | float(10,6)         | YES  |     | 0.000000          |       |
| lng              | float(10,6)         | YES  |     | 0.000000          |       |
| lat_lng          | point               | YES  |     | NULL              |       |
| image_1          | varchar(255)        | YES  |     | NULL              |       |
| create_timestamp | datetime            | NO   |     | CURRENT_TIMESTAMP |       |
+------------------+---------------------+------+-----+-------------------+-------+
```

### green_store

```sql
+------------------+--------------+------+-----+-------------------+-------+
| Field            | Type         | Null | Key | Default           | Extra |
+------------------+--------------+------+-----+-------------------+-------+
| place_id         | varchar(100) | NO   | PRI | NULL              |       |
| title            | varchar(255) | NO   | MUL | NULL              |       |
| description      | text         | YES  |     | NULL              |       |
| location         | varchar(50)  | YES  | MUL | NULL              |       |
| lat              | float(10,6)  | YES  |     | 0.000000          |       |
| lng              | float(10,6)  | YES  |     | 0.000000          |       |
| lat_lng          | point        | YES  |     | NULL              |       |
| address          | varchar(255) | YES  |     | NULL              |       |
| phone            | varchar(100) | YES  |     | NULL              |       |
| official_url     | varchar(255) | YES  |     | NULL              |       |
| map_url          | varchar(255) | YES  |     | NULL              |       |
| office_hours     | varchar(255) | YES  |     | NULL              |       |
| promo            | varchar(255) | YES  |     | NULL              |       |
| image_1          | varchar(255) | YES  |     | NULL              |       |
| image_2          | varchar(255) | YES  |     | NULL              |       |
| image_3          | varchar(255) | YES  |     | NULL              |       |
| tag              | varchar(255) | YES  |     | NULL              |       |
| create_timestamp | datetime     | NO   |     | CURRENT_TIMESTAMP |       |
+------------------+--------------+------+-----+-------------------+-------+
```



API
---

### /ticket

* GET
* Parameters

|name|value|require|
|---|---|---|
|date|2017/07/11|Y|
|time|1600|N|

* Request

```
GET /opendata/ticket?date=2017%2F07%2F11
```

* Reponse

```json
{
  "status": "success",
  "errno": null,
  "errmsg": null,
  "data": [
    {
      "time": "0900",
      "ticket": 141
    },
    {
      "time": "0930",
      "ticket": 147
    },
    {
      "time": "1000",
      "ticket": 126
    },
    {
      "time": "1030",
      "ticket": 141
    },
    {
      "time": "1100",
      "ticket": 140
    },
    {
      "time": "1130",
      "ticket": 150
    },
    {
      "time": "1200",
      "ticket": 150
    },
    {
      "time": "1230",
      "ticket": 142
    },
    {
      "time": "1300",
      "ticket": 134
    },
    {
      "time": "1330",
      "ticket": 142
    },
    {
      "time": "1400",
      "ticket": 144
    },
    {
      "time": "1430",
      "ticket": 150
    },
    {
      "time": "1500",
      "ticket": 143
    },
    {
      "time": "1530",
      "ticket": 96
    },
    {
      "time": "1600",
      "ticket": 50
    }
  ]
}
```

### /image

* GET
* Parameters

|name|value|require|
|---|---|---|
|url|http://ct-pass.com...|Y|

* Request

```
GET /opendata/image?url=http:%2F%2Fct-pass.com%2FfileHandler%2Fshow%2F13
```

* Reponse

```json
```

### /store

* GET
* Support fulltext title, description
* 單位公尺 / 預設 3000公尺
* Order By distance
* Parameters

|name|value|require|
|---|---|---|
|lat|23.143661|Y|
|lng|120.143555|Y|
|distance|10000|N|
|desc|核心|N|
|limit|10|N|

* Request

```
GET /opendata//attractions?lat=23.143661&lng=120.143555&distance=100000000&desc=%E6%95%85%E5%AE%AE&limit=5
```

* Reponse

```json
{
	"status": "success",
	"errno": null,
	"errmsg": null,
	"data": [
		{
			"title": "俄羅斯風情館",
			"description": "旅行，是一種放空的休閒，也是一種無國界探索與欣賞。當您走訪在純樸的鹿港小鎮，除了欣賞具數百年歷史的鹿港宗教建築廟宇文化之外，彎曲小巷當中……【後車巷】……，有一間充滿濃厚異國情調的店《俄羅斯風情館》...。深深值得你來一遊，會開這家店，來自於店主人在多年前收到第一組【俄羅斯娃娃】在胖嘟嘟的肚子裡，藏著一個又接著一個，大小尺寸不同的小娃娃。彩繪線條漂亮又可愛，讓店主人愛不釋手，萌生開一間以（俄羅斯娃娃）為主題的藝品小店。俄羅斯風情館，除了有俄羅斯娃娃，樺樹皮工藝品，霍赫洛姆漆器，軍徽，水晶球，陶瓷工藝品等等俄羅斯風味的商品，也有不少別具巧思的特色小物，和歐洲各國的特殊風格的紀念品...。所以來到鹿港，不妨也要來後車巷俄羅斯風情館走走逛逛，探索一下遙遠北歐不同風情文化藝術...。",
			"location": "彰化縣",
			"lat": "24.058191",
			"lng": "120.431847",
			"phone": "0916081432",
			"office_hours": " 12:00 PM~07:00 PM",
			"promo": "持卡享VIP折扣/滿500再送吊飾",
			"image_1": "http://ct-pass.com/fileHandler/show/4450",
			"image_2": "http://ct-pass.com/fileHandler/show/4451",
			"image_3": "http://ct-pass.com/fileHandler/show/4452",
			"distance": "105849",
			"match": "4.559409141540527"
		},
		{
			"title": "蘑菇詩人皮革手作",
			"description": "透過專業的技術,結合藝術的創作,融入生活的體驗與情感, 每一個完成的皮件商品都擁有著屬於它自己的故事.(皮革訂製鞋/皮革手工商品製作)",
			"location": "台中市",
			"lat": "24.014158",
			"lng": "120.695869",
			"phone": "0926-493-819",
			"office_hours": "",
			"promo": "出示中台灣好玩卡，購買店內100元以上(不包含)商品,即可折扣50元,                      參與體驗教學活動,即可折扣50元",
			"image_1": "http://ct-pass.com/fileHandler/show/366",
			"image_2": "http://ct-pass.com/fileHandler/show/367",
			"image_3": "http://ct-pass.com/fileHandler/show/368",
			"distance": "111970",
			"match": "9.118818283081055"
		}
	]
}
```

### /green_store

* GET
* Support fulltext title, description
* 單位公尺 / 預設 3000公尺
* Order By distance
* Parameters

|name|value|require|
|---|---|---|
|lat|23.143661|Y|
|lng|120.143555|Y|
|distance|10000|N|
|desc|核心|N|
|limit|10|N|

* Request

```
GET /opendata/green_store?lat=23.143661&lng=120.143555&distance=1000000&desc=%E9%A4%90%E9%A4%A8&limit=5
```

* Reponse

```json
{
	"status": "success",
	"errno": null,
	"errmsg": null,
	"data": [
		{
			"title": "晴預約餐坊",
			"description": null,
			"location": "嘉義縣",
			"address": "613嘉義縣朴子市永和里49之24號",
			"lat": "23.465269",
			"lng": "120.232445",
			"phone": "05-3661600",
			"office_hours": null,
			"promo": null,
			"image_1": "https://lh3.googleusercontent.com/p/AF1QipOO3O3ZLLBrXB1SgZdNcFe9BmDhuscocmvMfdtF=s1600-h500",
			"image_2": "https://lh3.googleusercontent.com/p/AF1QipPX4mYeKHnSI6A2RsZvKVmm2fuYXaJs1dmsevfg=s1600-h500",
			"image_3": "https://lh3.googleusercontent.com/p/AF1QipN2A1_Wrj4UAoG0eqHFGZZXkCUuJGkf3S0d39qP=s1600-h500",
			"distance": "36895",
			"tag": "環保餐館",
			"match": "0.9437044858932495"
		},
		{
			"title": "一安小吃部「采荷居」",
			"description": null,
			"location": "嘉義縣",
			"address": "613嘉義縣朴子市山通路24之13號",
			"lat": "23.466709",
			"lng": "120.246803",
			"phone": "05-3661255",
			"office_hours": null,
			"promo": null,
			"image_1": "https://greenliving.epa.gov.tw/GreenLife/Actions/GreenRestaurant/Files/StoreImages/5576f062-0590-47eb-b8b5-a54e418a4a00.jpg",
			"image_2": "https://c1.staticflickr.com/6/5708/30269705752_e791ab13b1_z.jpg",
			"image_3": null,
			"distance": "37437",
			"tag": "環保餐館",
			"match": "0.9437044858932495"
		},
		{
			"title": "一家餐廳",
			"description": null,
			"location": "嘉義縣",
			"address": "613嘉義縣朴子市公園2街20號",
			"lat": "23.465380",
			"lng": "120.252899",
			"phone": "05-3798009",
			"office_hours": null,
			"promo": null,
			"image_1": "http://pic.pimg.tw/autu/1327923219-3903789546_n.jpg",
			"image_2": null,
			"image_3": null,
			"distance": "37476",
			"tag": "環保餐館",
			"match": "0.9437044858932495"
		},
		{
			"title": "香夫子麵食館(福臨)",
			"description": null,
			"location": "嘉義縣",
			"address": "612嘉義縣太保市安仁里詳和三路東段290號",
			"lat": "23.454067",
			"lng": "120.295876",
			"phone": "05-3627185",
			"office_hours": null,
			"promo": null,
			"image_1": "https://greenliving.epa.gov.tw/GreenLife/actions/greenrestaurant/Files/StoreImages/ac2d8835-d0bd-43ce-b57f-dd0ab987f18c.JPG",
			"image_2": null,
			"image_3": null,
			"distance": "37859",
			"tag": "環保餐館",
			"match": "0.9437044858932495"
		},
		{
			"title": "饌食冷飲店(阿墨)",
			"description": null,
			"location": "嘉義縣",
			"address": "612嘉義縣太保市安仁里棒球一街8號",
			"lat": "23.455889",
			"lng": "120.293388",
			"phone": "05-3625701",
			"office_hours": null,
			"promo": null,
			"image_1": "https://greenliving.epa.gov.tw/GreenLife/actions/greenrestaurant/Files/StoreImages/82acc3cc-7c4d-4667-a8e0-bb7155ad9c17.jpg",
			"image_2": null,
			"image_3": null,
			"distance": "37941",
			"tag": "環保餐館",
			"match": "0.9437044858932495"
		}
	]
}
```

### /power

* GET
* 單位公尺 / 預設 3000公尺
* Order By distance
* Parameters

|name|value|require|
|---|---|---|
|lat|23.143661|Y|
|lng|120.143555|Y|
|distance|10000|N|
|limit|10|N|

* Request

```
GET /opendata/power?lat=23.143661&lng=120.143555&distance=10000&limit=5
```

* Reponse

```json
{
	"status": "success",
	"errno": null,
	"errmsg": null,
	"data": [
		{
			"title": "呈祥機車行",
			"location": "台南市",
			"address": "臺南市七股區大埕村大埕297號1樓",
			"local": "店內",
			"lat": "23.142830",
			"lng": "120.142593",
			"phone": "06-787-2165",
			"image_1": "https://lh3.googleusercontent.com/p/AF1QipO6MTaqUCMGwiXB69e9Mfe3sTt7T6_N0TngEKQm=s1600-h500",
			"office_hours": "車行營業時間",
			"cost": "免費",
			"restrict_status": "無限制服務對象\r",
			"distance": "135"
		},
		{
			"title": "清源機車行",
			"location": "台南市",
			"address": "臺南市佳里區光復路92-1號1樓",
			"local": "店內",
			"lat": "23.157900",
			"lng": "120.175079",
			"phone": null,
			"image_1": null,
			"office_hours": "車行營業時間",
			"cost": "免費",
			"restrict_status": "無限制服務對象\r",
			"distance": "3591"
		},
		{
			"title": "昌興機車行",
			"location": "台南市",
			"address": "臺南市佳里區建南里光復路159號",
			"local": "店內",
			"lat": "23.159155",
			"lng": "120.174706",
			"phone": null,
			"image_1": null,
			"office_hours": "車行營業時間",
			"cost": "免費",
			"restrict_status": "無限制服務對象\r",
			"distance": "3621"
		},
		{
			"title": "鋐昌車業行",
			"location": "台南市",
			"address": "臺南市佳里區和平街151號",
			"local": "店內",
			"lat": "23.162130",
			"lng": "120.175720",
			"phone": null,
			"image_1": null,
			"office_hours": "車行營業時間",
			"cost": "免費",
			"restrict_status": "無限制服務對象\r",
			"distance": "3877"
		},
		{
			"title": "東誠機車行",
			"location": "台南市",
			"address": "臺南市佳里區光復路365號1樓",
			"local": "店內",
			"lat": "23.164150",
			"lng": "120.174828",
			"phone": null,
			"image_1": null,
			"office_hours": "車行營業時間",
			"cost": "免費",
			"restrict_status": "無限制服務對象\r",
			"distance": "3926"
		}
	]
}
```

### /attractions

* GET
* 單位公尺 / 預設 3000公尺
* Order By distance
* Parameters

|name|value|require|
|---|---|---|
|lat|23.143661|Y|
|lng|120.143555|Y|
|distance|10000|N|
|limit|10|N|

* Request

```
GET /opendata/attractions?lat=23.143661&lng=120.143555&distance=100000000&desc=%E6%95%85%E5%AE%AE&limit=5
```

* Reponse

```json
{
	"status": "success",
	"errno": null,
	"errmsg": null,
	"data": [
		{
			"url": "http://ct-pass.com/store/show/92?lang=zh_TW",
			"title": "故宮南院",
			"description": "國立故宮博物院南部院區是亞洲第一座以「亞洲藝術文化」為主題，結合在地文化的大型國家博物館。從文化交流觀點策畫豐富多元的亞洲藝術文化展覽內容。09:00~17:00 (每週一休館)，並依館方公告為主。有關參觀相關事宜請洽故宮南院參觀諮詢專線05-3620777。 ※逢每週一休館改為參觀蒜頭糖廠蔗埕文化園區，並安排搭乘五分車遊園區。",
			"location": "嘉義縣",
			"lat": "23.473129",
			"lng": "120.292717",
			"phone": "05-362-0777",
			"image_1": "http://ct-pass.com/fileHandler/show/183",
			"distance": "39676",
			"match": "8.022626876831055"
		}
	]
}
```

### /coordinate

* GET
* Parameters

|name|value|
|---|---|
|address|中埔鄉中埔村中埔128號|

* GET

```
GET /opendata/coordinate?address=%E4%B8%AD%E5%9F%94%E9%84%89%E4%B8%AD%E5%9F%94%E6%9D%91%E4%B8%AD%E5%9F%94128%E8%99%9F
```

* Response

```json
{
	"status": "success",
	"errno": null,
	"errmsg": null,
	"data": {
		"lat": 23.425139,
		"lng": 120.522952
	}
}
```

API Error
---

|error no|error message|
|---|---|
|999|Parameters empty or fail|
|301|Date illegal|
|302|Not found lat lng|
