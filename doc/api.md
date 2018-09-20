# 公选课接口文档

## 接口说明

baseUrl:`待定`

使用请求头`Authorization`携带token`token {your token}`请求接口

采用`RESTful`风格设计接口

基本返回格式:

OK(HttpStus`200`):

```json

{
    "error":0,
    "msg":"success",
    "timeStamp":123456,
    "data":"dataJsonHere"
}

```

ERROR(HttpStus`4xx`)

```json

{
    "error":"error code here",
    "msg":"error msg here",
    "timeStamp":123456
}

```

注意:**详细返回内容暂未完成**

## 接口详情

cas认证登录及授权由`杭电助手`后端接口实现，本部分不予以叙述

## `/class`公选课信息相关

### GET `/class/search`搜索公选课

queries:

- `page` 页面偏移量，一页十条记录
- `keyword` 公选课关键字，匹配形式为`%keyword%`

response(200):

```json

```

### GET `/class/info`获取公选课详情

querise:

- `id` classId

response(200):

```json

```

## `/comment` 公选课评价相关

### GET `/comment/info` 获取评论信息

queries:

两类查询：`根据课程id查询`和`根据评论id获得详细信息`

根据课程id查询:

- `classId` classId
- `pages` 页面偏移，一次十条

response(200):

```json

```

根据评论id查询：

- `commentId` commentId

response(200):

```json

```

### POST `/comment/info` 提交评论

提交评论并返回当前评论id

PostForm:

- `body` 评论主体
- `score` 课程评分`1`-`10`

response(200):

```json

```

### PUT `/comment/info` 修改评论

PostForm:

- `id` CommentId
- `body` 评论主体

response(200):

```json

```

## `/schedule` 课表相关

### GET `/schedule/base` 获取个人课表

response(200):

```json

```

### GET `/schedule/recommend` 获取推荐公选课

response(200):

```json

```

## `/person` 个人信息相关

### PUT `/person/info` 修改个人信息

PostForm(可空):

- `nickName` 昵称
- `image` 头像

response(200):

```json

```