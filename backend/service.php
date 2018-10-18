<?
//框架对象
class Service {
    //构造执行器
    public function __construct($path = '',$getArr = array(),$postArr = array()){
        $this->path = $path;
        $this->getArr = $getArr;
        $this->postArr = $postArr;
    }

    public $path;
    public $getArr;
    public $postArr;

    //初始化数据库
    public function initDatebase(){
        require_once('database.php');
    }

    //加载控制器
    public function loadController($path){

    }

    //路由
    public function initRotuer(){

    }


}