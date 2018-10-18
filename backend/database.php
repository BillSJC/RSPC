<?php
    class Database {
        //构造器/连接


        public function __construct(){
            $dbms='mysql';     //数据库类型
            $host='localhost'; //数据库主机名
            $dbName='test';    //使用的数据库
            $user='root';      //数据库连接用户名
            $pass='';          //对应的密码
            $dsn="$dbms:host=$host;dbname=$dbName";
            $this->db = new PDO($dsn, $user, $pass);
        }

        public PDO $db;

        //添加用户
        public function addUser(){

        }

        //写入课表
        public function addSecedule(){

        }

        //获取用户信息
        public function getUserInfo(){

        }

        //获取课表信息
        public function getScheduleInfo(){

        }
    }