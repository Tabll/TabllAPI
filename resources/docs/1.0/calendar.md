
- [日历](#section-1)
- [节假日接口](#section-2)
- [假期数组接口](#section-3)

- [错误码](#section-99)

<a name="section-1"></a>
# 日历
---

<a name="section-2"></a>
## 节假日接口
> {info.fa-calendar-alt} EXAMPLE: https://api.tabll.cn/api/calender?region=CN&type=1&year=2020

| Method | URI   | Headers |
| : |   :-   |  :  |
| GET | `/api/calender` | Default  |

#### URL Params
```json
{
    "region"    : "CN",
    "type"      : "1",
    "year"      : "2020",
    "month"     : "1",
    "group_by"  : "name"
}
```
region: 地区（非必填，默认`CN`）暂时只支持 `CN`  
type: 类型（非必填，默认`1`）1: 假期 2:调休 暂时只支持 `1`  
year: 年份（非必填，默认当前年份）暂时只支持 `2020`  
month: 月份（非必填）  
group_by: 分组（支持按 `name` 分组）  

> {success} Success Response

```json
{
    "code": 1,
    "message": "success",
    "result": [
        {
            "date": "2020-01-01",
            "name": "元旦"
        },
        {
            "date": "2020-01-24",
            "name": "春节"
        },
        {
            "date": "2020-01-25",
            "name": "春节"
        }
    ]
}
```


<a name="section-3"></a>
## 假期数组接口
> {info.fa-calendar-alt} EXAMPLE: https://api.tabll.cn/api/calender/simple?region=CN&type=1&year=2020

| Method | URI   | Headers |
| : |   :-   |  :  |
| GET | `/api/calender/simple` | Default  |

#### URL Params
```json
{
    "region"    : "CN",
    "type"      : "1",
    "year"      : "2020",
    "month"     : "1"
}
```
region: 地区（非必填，默认`CN`）暂时只支持 `CN`  
type: 类型（非必填，默认`1`）1: 假期 2:调休 暂时只支持 `1`  
year: 年份（非必填，默认当前年份）暂时只支持 `2020`  
month: 月份（非必填）  

> {success} Success Response

```json
{
    "code": 1,
    "message": "success",
    "result": [
        "2020-01-01",
        "2020-01-24",
        "2020-01-25"
    ]
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
            "不支持的类型"
        ],
        "region": [
            "不支持的区域"
        ],
        "year": [
            "不支持的年份"
        ]
    },
    "result": ""
}
```
