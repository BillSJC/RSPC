# 数据库表设计

用户信息表`user_info`

- `id` id-int
- `user` 学号-text
- `name` 姓名-text
- `logTime` 记录时间-int
- `nickName` 昵称-text

公选课评价表`class_comment`

- `id` id-int
- `user` 来自学号-text
- `tiemstamp` 提交时间-int
- `classId` 课程号-text
- `body` 正文-text
- `score` 分数-int
- `likes` 点赞数-int

公选课列表`class_list`

- `id` id-int
- `classId` 选课号-text
- `className` 课程名称-text
- `calssTeacher` 任课老师-text
- `classTime` 上课时间-text
- `score_count` 评分总数-int
- `score_avg` 平均分-int
- `logTime` 记录时间-int

![数据库结构](static/db.png)