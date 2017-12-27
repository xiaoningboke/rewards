<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\UserModel;

class IndexController extends Controller {
    /**
     * 显示登录界面
     * @return [type] [description]
     */
    public function index(){
        if (!session('?name')) {
            $this->display('login');
            exit();
        }else{
            $identify=$_SESSION['identify'];
            $number=$_SESSION['name'];
            $this->jump($identify,$number);
        }
        //$this->display('login');
    }
    /**
     * 判断登录
     * @return [type] [description]
     */
    public function login(){
    	$identify = $_POST['identify'];
    	$number = $_POST['number'];
    	$password = $_POST['password'];
    	$user = new UserModel();
    	$respassword=$user->respersonal($identify,$number);
        //var_dump($respassword);
    	if($respassword[password] == $password){
            $this->jump($identify,$number);
    	}else{
    	   $this->error("账号或密码不对",U('Home/Index/index'));
    	}
    }
    public function jump($identify,$number){
        session('name',$number); 
        session('identify',$identify); 
        if($identify==0){
            $this->success("登录成功",U('Home/Admin/index'));
        }else if ($identify==1) {
            $this->success("登录成功",U('Home/Teacher/index'));
        }else{
            $this->success("登录成功",U('Home/Student/index'));
        }
    }
}