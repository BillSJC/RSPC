<?php

//add some func in CI_Input class
class MY_Input extends CI_Input{
    public function __construct(){
        parent::__construct();
        $this->header = array();
        foreach ($_SERVER as $name => $value) { 
            if (substr($name, 0, 5) == 'HTTP_') { 
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
            } 
        }
        $this->header = $headers;
    }

    public $header;
    
    /**
	 * getHttpHeader
	 *
	 * get the httpHeader
	 *
	 * @param	string your httpKey
	 * @return	string your httpHeaderValue
	 */
    public function getHttpHeader($key){
        if(!array_key_exists($key,$this->header)){
            return null;
        }
        return $this->header[$key];
    }
}