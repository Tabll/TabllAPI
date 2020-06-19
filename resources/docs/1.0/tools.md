
- [工具](#section-1)
- [获取随机密码接口](#section-2)
- [字符串长度截取](#section-3)

- [错误码](#section-99)

<a name="section-1"></a>
# 工具
---

<a name="section-2"></a>
## 获取随机密码接口
> {info.fa-calendar-alt} EXAMPLE: https://api.tabll.cn/api/test/password?length=128

| Method | URI   | Headers |
| : |   :-   |  :  |
| GET | `/api/test/password` | Default |

#### URL Params
```json
{
    "length"    : "10"
}
```
length: 密码长度（非必填，默认`10`，最大`128`）  

> {success} Success Response

```json
{
    "code": 1,
    "message": "success",
    "result": "sAaqQen5WP"
}
```

---

<a name="section-3"></a>
## 字符串长度截取
> {info.fa-calendar-alt} EXAMPLE: https://api.tabll.cn/api/test/string/length?string=这个字符串一共有十位&length=15

| Method | URI   | Headers |
| : |   :-   |  :  |
| GET | `/api/test/string/length` | Default |

#### URL Params
```json
{
    "string"    : "这个字符串一共有十位",
    "length"    : "15",
    "end"       : "..."
}
```
string: 字符串（非必填，最大`10000`）  
length: 截取长度（非必填，默认`200`，最小`1`）  
end: 超出部分代替（非必填，默认`...`）  

> {success} Success Response

```json
{
    "code": 1,
    "message": "success",
    "result": {
        "length": 10,
        "max_string": "这个字符串一共..."
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
        "length": [
            "超出最大长度限制"
        ]
    },
    "result": ""
}
```
