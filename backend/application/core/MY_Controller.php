<?php
/** MY_Controller
 * extention of CI_Controller
 * 
 */
class MY_Controller extends CI_Controller {

    public function __construct(){
        parent::__construct();

        //input your sign here
        header("content-type: application/json");
        $this->signstr = 'sign here';
        $this->schoolYear = "2018-2019";
        $this->semester = '1';
        $this->baseurl = 'https://api.hduhelp.com';
        $this->apis = array(
            "school"=>array(
                "url" => "http://127.0.0.1:8085/v1",
                "sign" => "hduapisign"
            )
        );
    }

    //gateway sign
    public $signstr;
    public $schoolYear;
    public $semester;
    public $baseurl;
    public $apis;
	/**
	 * checkSign
	 *
	 * check your gateway sign here
	 * if the sign is correct then return true
	 *
	 * @param	null
	 * @return	boolean
	 */
    public function checkSign(){
        $sign = $this->input>getHttpHeader('sign');
        if(strcmp($sign,$this->$signstr)==0){
            return true;
        }
        return false;
    }

    /**
     * getUserInfo
     * getStaffidAndStaffInfo
     */
    public function getUserInfo(){
		$token = $this->input->getHttpHeader('Authorization');
		if(is_null($token)){
			echo $this->makeErrorJSON(401,40100,'Unauthorized');
		}
		$rersp = $this->sendRequestToMainAPI('school','student/info',array(),$token,false);
        $arr = json_decode($rersp,true);
        if(is_null($arr)){
            makeErrorJSONandDie(400,50000,"NetworkError");
        }
        return $arr;
    }

    /**
     * getStaffInfo
     * ask hdu-api for student info dateily
     */
    public function getStaffInfo($staffid=''){
        $schoolYear = $this->schoolYear;
        $semester = $this->semester;
        return $this->sendRequestToOtherAPI("school","teaching/schedule?schoolYear={$schoolYear}&semester={$semester}",array(),$staffid,false,$this->signstr);
    }

    /**
     * getSchedule
     * ask hdu-api for student info dateily
     */
    public function getSchedule($staffid=''){
        return $this->sendRequestToOtherAPI("school","student/info",array(),$staffid,false,$this->signstr);
    }

    /**
	 * sendRequestToOtherAPI
	 *
	 * send request to other APIS
     * 
	 */
    public function sendRequestToAPI($appid = '',$path = '',$postForm = array(),$staffid = '',$isPost = false,$sign){
        $baseurl = $this->apis[$appid];
        $apiBaseUrl = "{$baseurl}/{$appid}/{$path}";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiBaseUrl);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        if($isPost){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postForm);
        }
        curl_setopt($ch,CURLOPT_HTTPHEADER,array("Authorization:{$token}","staffid:{$staffid}"));
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }

    public function sendRequestToMainAPI($appid,$path,$postForm,$token,$isPost){
        
        $baseurl = $this->baseurl;
        $apiBaseUrl = "{$baseurl}/{$appid}/{$path}";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $apiBaseUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        /*
        if($isPost){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postForm);
        }
        */
        curl_setopt($curl,CURLOPT_HTTPHEADER,array("Authorization:{$token}"));
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }

    /**
	 * classProcessor
	 *
	 * main Processor of recommand
     * 
	 */
    public function classProcessor(){

    }

    /**
     * makeErrorJSON
     * 
     * make output JSON to show errors
     */
    public function makeErrorJSON($httpCode=400,$errcode = 40000,$errmsg = 'bad request'){
        $this->httpStatus($httpCode);
        return json_encode(array(
            'error' => $errcode,
            'msg' => $errmsg,
            'time' => time()
        ));
    }

    /**
     * makeErrorJSON
     * 
     * make output JSON to show errors
     */
    public function makeErrorJSONandDie($httpCode=400,$errcode = 40000,$errmsg = 'bad request'){
        $this->httpStatus($httpCode);
        echo json_encode(array(
            'error' => $errcode,
            'msg' => $errmsg,
            'time' => time()
        ));
        die();
    }

    
    /**
     * httpStatus
     * 
     * edit httpStatusCode to http header
     */
    public function httpStatus($code) { 
        $http = array ( 
            100 => "HTTP/1.1 100 Continue", 
            101 => "HTTP/1.1 101 Switching Protocols", 
            200 => "HTTP/1.1 200 OK", 
            201 => "HTTP/1.1 201 Created", 
            202 => "HTTP/1.1 202 Accepted", 
            203 => "HTTP/1.1 203 Non-Authoritative Information", 
            204 => "HTTP/1.1 204 No Content", 
            205 => "HTTP/1.1 205 Reset Content", 
            206 => "HTTP/1.1 206 Partial Content", 
            300 => "HTTP/1.1 300 Multiple Choices", 
            301 => "HTTP/1.1 301 Moved Permanently", 
            302 => "HTTP/1.1 302 Found", 
            303 => "HTTP/1.1 303 See Other", 
            304 => "HTTP/1.1 304 Not Modified", 
            305 => "HTTP/1.1 305 Use Proxy", 
            307 => "HTTP/1.1 307 Temporary Redirect", 
            400 => "HTTP/1.1 400 Bad Request", 
            401 => "HTTP/1.1 401 Unauthorized", 
            402 => "HTTP/1.1 402 Payment Required", 
            403 => "HTTP/1.1 403 Forbidden", 
            404 => "HTTP/1.1 404 Not Found", 
            405 => "HTTP/1.1 405 Method Not Allowed", 
            406 => "HTTP/1.1 406 Not Acceptable", 
            407 => "HTTP/1.1 407 Proxy Authentication Required", 
            408 => "HTTP/1.1 408 Request Time-out", 
            409 => "HTTP/1.1 409 Conflict", 
            410 => "HTTP/1.1 410 Gone", 
            411 => "HTTP/1.1 411 Length Required", 
            412 => "HTTP/1.1 412 Precondition Failed", 
            413 => "HTTP/1.1 413 Request Entity Too Large", 
            414 => "HTTP/1.1 414 Request-URI Too Large", 
            415 => "HTTP/1.1 415 Unsupported Media Type", 
            416 => "HTTP/1.1 416 Requested range not satisfiable", 
            417 => "HTTP/1.1 417 Expectation Failed", 
            500 => "HTTP/1.1 500 Internal Server Error", 
            501 => "HTTP/1.1 501 Not Implemented", 
            502 => "HTTP/1.1 502 Bad Gateway", 
            503 => "HTTP/1.1 503 Service Unavailable", 
            504 => "HTTP/1.1 504 Gateway Time-out"  
        ); 
        header($http[$code]); 
    } 
}