<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends CI_Controller {

	public function __construct()
	{
		$this->load->model("data_model");
    }
    
    public function debugInitUser(){
        $token = $this->input->get("token");
        $this->Data_model->getUserInfo($token);
    }
}
