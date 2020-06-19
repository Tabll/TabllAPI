
- [地图](#section-1)
- [坐标转换](#section-2)

- [错误码](#section-99)

<a name="section-1"></a>
# 地图
---

<a name="section-2"></a>
## 坐标转换
> {info.fa-calendar-alt} EXAMPLE: https://api.tabll.cn/api/tool/map/convert?type=bd-to-gd&lon=120.28020857502526&lat=30.177595995901246

| Method | URI   | Headers |
| : |   :-   |  :  |
| GET | `/api/tool/map/convert` | Default  |

#### URL Params
```json
{
    "type"     : "bd-to-gd",
    "lon"      : 120.28020857502526,
    "lat"      : 30.177595995901246
}
```
type: 转换类型（必填）`bd-to-gd`:百度转高德 `gd-to-bd`:高德转百度  
lon: 经度坐标（必填）  
lat: 纬度坐标（必填）  

> {success} Success Response

```json
{
    "code": 1,
    "message": "success",
    "result": {
        "lon": 120.28666,
        "lat": 30.183779
    }
}
```

---

<a name="section-99"></a>
## 错误码

> {danger.fa-close} ERROR Response

| Error Code | Message |
| : |   :   |
| -400 | 参数校验失败 |
```json
{
    "code": -400,
    "message": {
        "type": [
            "不支持的转换类型"
        ],
        "lon": [
            "经度必须为数字"
        ],
        "lat": [
            "纬度不合法"
        ]
    },
    "result": ""
}
```
