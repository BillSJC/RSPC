<?php
    class Data_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        //从数据库中抓取用户信息，没有则init
        public function getUserInfo($stuno,$token){
            $resp = $this->db->get_where("user_info",array('user'=>$stuno));
            $respArr = $resp->row_array();
            if(count($respArr)<1){
                return initUser($token);
            }
            return $respArr;
        }

        //初始化用户
        public function initUser($token){
            $ch = curl_init("https://api.hduhelp.com/school/student/info");
            $headers = array('Authorization'=>$token);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
            $resp = curl_exec($ch);
            curl_close($ch);
            var_dump($resp);
            $respArr = json_decode($resp,true);
            if(empty($respArr)){
                return false;
            }
            /*
            {
                "error":0,"msg":"success","appid":"school","version":"0.4.0","isCache":false,"timestamp":1537836306,
                "data":{
                    "ATSCHOOLORNOT":"1",
                    "CLASSID":"15052411",
                    "GRADE":"2015",
                    "MAJORCODE":"2724",
                    "REGISTERORNOT":"1",
                    "STAFFID":"15051237",
                    "STAFFNAME":"杨飞",
                    "UNITCODE":"27"
                }
            }
            */
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