<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\UserModel;
use Home\Model\MassageModel;

class StudentController extends Controller {
    /**
     * 显示管理员的首页
     * @return [type] [description]
     */
    public function index(){
        $this->display();
    }
    /**
     * 显示管理员个人信息的首页
     * @return [type] [description]
     */
    public function personal(){
        $identify=$_SESSION['identify'];
        $number=$_SESSION['name'];
        $user = new UserModel();
        $personalData = $user->respersonal($identify,$number);
        $this->assign('personalData',$personalData);
        $this->display();
    }
    /**
     * 接受修改个人信息
     * @return [type] [description]
     */
    public function exitpersonal(){
        $number = $_POST[number];
        $id = $_POST[id];
        $name = $_POST[name];
        $sex = $_POST[sex];
        $email = $_POST[email];
        $user = new UserModel();
        $s = $user->exitpersonal($id,$number,$name,$sex,$email);
        if($s>0){
          $this->success('更新成功',U('Home/Admin/personal'));
        }
        else{
           $this->error('没有更新',U('Home/Admin/personal'));
        }
    }
    /**
     * 显示密码修改界面
     * @return [type] [description]
     */
    public function password(){
        $this->display();
    }
    /**
     * 接受更改密码
     * @return [type] [description]
     */
    public function exitpassword(){
        $identify=$_SESSION['identify'];
        $number=$_SESSION['name'];
        $user = new UserModel();
        $personalData = $user->respersonal($identify,$number);
        $id=$personalData[id];
        $oldpassword = $_POST[oldpassword];
        $password = $_POST[password];
        if($oldpassword == $personalData[password]){
            $s = $user->exitpassword($id,$password);
            if($s>0){
              $this->success('更新成功',U('Home/Admin/password'));
            }
            else{
               $this->error('没有更新',U('Home/Admin/password'));
            }
        }
    }
    /**
     * 查询所有的学生奖惩信息
     * @return [type] [description]
     */
    public function reward(){
        $mas = new MassageModel();
        $masData = $mas->selMassage();
        $this->assign("masData",$masData);
        $this->display();
    }
     public function xsStudent(){
        $id = $_GET[id];
        $mas = new MassageModel();
        $masData = $mas->findMassage($id);
        $this->assign("masData",$masData);
        $this->display();
    }
    
}
