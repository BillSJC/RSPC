<?php
    class Data_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        //获取学生课表
        public function getStuTable($token){
        
        }

        //token鉴权
        public function getTokenValidate($token){

        }

        //获取用户信息
        public function getUserInfo($token){

        }

    }
?>