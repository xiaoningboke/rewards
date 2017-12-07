<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\UserModel;

class AdminController extends Controller {
    public function index(){
        $this->display();
    }
    public function student(){
    	$student = new UserModel();
    	$studentDate = $student->resStudent();
    	$code = count($studentDate);
    	$jsonString = '{"code":0,"msg":"","count":'.$code.',"data":[{';
    	//var_dump($jsonData);
    	foreach ($studentDate as $value) {
    			$jsonData = $jsonData.'"id":'.$value[id].'-----';
    	}
    	var_dump($jsonData);
    	//var_dump($studentDate);
    }
}