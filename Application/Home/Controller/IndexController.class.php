<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\UserModel;

class IndexController extends Controller {
    public function index(){
        $this->display('login');
    }
    public function login(){
    	$identify = $_POST['identify'];
    	$number = $_POST['number'];
    	$password = $_POST['password'];
    	$user = new UserModel();
    	$respassword=$user->resPassword($identify,$number);
    	if($respassword == $password){
    		$this->success("登录成功");
    	}else{
    		$this->error(登录失败);
    	}
    }
}