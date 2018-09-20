<?php
    class Data_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        //从数据库中抓取用户信息，没有则init
        public function getUserInfo($stuno){

        }

        //初始化用户
        public function initUser($stuno){

        }

        //编辑用户昵称
        public function editUserInfo($stuno,$nick){

        }

        //添加评论
        public function addComment($stuno,$classId,$body,$score){

        }

        //编辑评论
        public function editComment($stuno,$classId,$body){

        }

        //获得评论
        public function getCommentByClassId($classId,$prefix){

        }

        //获取公选课信息
        public function getClassInfo($classId){

        }

    }