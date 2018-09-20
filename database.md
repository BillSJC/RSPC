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
- `tiemstamp` 提交时间-text
- `classId` 课程号-text
- `body` 正文-text
- `like` 点赞数-int

公选课列表`class_list`

- `id` id-int
- `classId` 选课号-text
- `className` 课程名称-text
- `calssTeacher` 任课老师-text
- `classTime` 上课时间-text
- `logTime` 记录时间-int