<?php
    $path = $_SERVER['PATH_INFO'];
    $getArr = $_GET;
    $postArr = $_POST;

    require_once('service.php');

    $service = new Service($path,$getArr,$postArr);