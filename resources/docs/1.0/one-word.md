
- [一言](#section-1)
- [获取一言](#section-2)

- [错误码](#section-99)

<a name="section-1"></a>
# 一言
---

<a name="section-2"></a>
## 获取一言
> {info.fa-calendar-alt} EXAMPLE: https://api.tabll.cn/api/one-word

| Method | URI   | Headers |
| : |   :-   |  :  |
| GET | `/api/one-word` | Default  |

#### URL Params
```json
{
}
```

> {success} Success Response

```json
{
    "code": 1,
    "message": "success",
    "result": {
        "word": "天下古今之庸人，皆以一慵字致败；天下古今之才人，皆以一傲字致败",
        "from": "匿名",
        "type": 1
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
    "message": "",
    "result": ""
}
```
