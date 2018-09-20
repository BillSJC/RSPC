<?php
    class Data_model extends CI_Model {

        public function __construct()
        {
            $this->load->database();
        }

        public function getUserInfo($stuno){

        }

        public function initUser($stuno){

        }

        public function editUserInfo($stuno,$nick){

        }

        public function addComment($stuno,$classId,$body,$score){

        }

        public function editComment($stuno,$classId,$body){

        }

        public function getCommentByClassId($classId,$prefix){

        }

        public function getClassInfo($classId){

        }

    }