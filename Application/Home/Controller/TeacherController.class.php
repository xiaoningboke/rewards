<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\UserModel;
use Home\Model\MassageModel;

class TeacherController extends Controller {
	/**
	 * 显示教师的首页
	 * @return [type] [description]
	 */
    public function index(){
        $this->display();
    }
    /**
     * 显示教师个人信息的首页
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
    	$id = $_POST[id];
    	$name = $_POST[name];
    	$sex = $_POST[sex];
    	$email = $_POST[email];
    	$user = new UserModel();
    	$s = $user->exitpersonal($id,$name,$sex,$email);
    	if($s>0){
          $this->success('更新成功',U('Home/Teacher/personal'));
        }
        else{
           $this->error('没有更新',U('Home/Teacher/personal'));
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
	          $this->success('更新成功',U('Home/Teacher/password'));
	        }
	        else{
	           $this->error('没有更新',U('Home/Teacher/password'));
	        }
    	}
    }
    /**
     * 显示所有学生信息页面
     * @return [type] [description]
     */
    public function student(){
        $user = new UserModel();
        $studentData=$user->secstudent();
        $this->assign('studentData',$studentData);
        $this->display(); 
    }
    /**
     * 显示一条学生数据，以便修改
     * @return [type] [description]
     */
    public function editStudent(){
        $id = $_GET[id];
        $user = new UserModel();
        $studentData=$user->findStudent($id);
        $this->assign('studentData',$studentData);
        $this->display();
    }
    /**
     * 接收更新的学生信息
     * @return [type] [description]
     */
    public function editStudents(){
        $id=$_POST[id];
        $number=$_POST[number];
        $name=$_POST[name];
        $sex=$_POST[sex];
        $email=$_POST[email];
        $user = new UserModel();
        $s=$user->exitpersonal($id,$name,$sex,$email);
        if($s>0){
              $this->success('更新成功',U('Home/Teacher/student'));
        }else{
               $this->error('没有更新',U('Home/Teacher/student'));
        }
    }
    /**
     * 显示添加学生的页面
     * @return [type] [description]
     */
    public function addstudent(){
        $this->display();
    }
    /**
     * 接收添加学生的信息
     */
    public function addStudents(){
        $number=$_POST[number];
        $name=$_POST[name];
        $sex=$_POST[sex];
        $email=$_POST[email];
        $user = new UserModel();
        $s=$user->addstudent($number,$name,$sex,$email);
        if($s>0){
              $this->success('添加成功',U('Home/Teacher/student'));
        }else{
               $this->error('添加失败',U('Home/Teacher/student'));
        }
    }
    /**
     * 删除一个学生
     * @return [type] [description]
     */
    public function delStudent(){
        $id = $_GET[id];
        $user = new UserModel();
        $s=$user->delstudent($id);
        if($s>0){
              $this->success('删除成功',U('Home/Teacher/student'));
        }else{
               $this->error('删除失败',U('Home/Teacher/student'));
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
    /**
     * 查询一条同学的奖惩信息
     * @return [type] [description]
     */
    public function xsStudent(){
        $id = $_GET[id];
        $mas = new MassageModel();
        $masData = $mas->findMassage($id);
        $this->assign("masData",$masData);
        $this->display();
    }
    /**
     * 展示添加学生奖惩信息
     */
    public function addReward(){
        $user = new UserModel();
        $userData = $user->secstudent();
        $this->assign('userData',$userData);
        $this->display();
    }
    /**
     * 接收添加的奖惩信息
     */
    public function addRewards(){
        $title = $_POST[title];
        $name = $_POST[name];
        $time = $_POST[time];
        $type = $_POST[type];
        $encouragemess = $_POST[info];
        $mas = new MassageModel();
        $s = $mas->addMassage($title,$name,$time,$type,$encouragemess);
        if($s>0){
              $this->success('添加成功',U('Home/Teacher/reward'));
        }else{
               $this->error('添加失败',U('Home/Teacher/reward'));
        }
    }
    /**
     * 修改页面
     * @return [type] [description]
     */
    public function editReward(){
        $id = $_GET[id];
        $mas = new MassageModel();
        $masData = $mas->findMassage($id);
        $user = new UserModel();
        $userData = $user->secstudent();
        $this->assign('userData',$userData);
        $this->assign('masData',$masData);
        $this->display();
    }
    /**
     * 接收修改的奖惩信息
     * @return [type] [description]
     */
   public function editRewards(){
        $id=$_POST[id];
        $title=$_POST[title];
        $name=$_POST[name];
        $type=$_POST[type];
        $time=$_POST[time];
        $encouragemess=$_POST[info];
        $user = new MassageModel();
        $s=$user->editReward($id,$title,$name,$type,$time,$encouragemess);
        if($s>0){
              $this->success('更新成功',U('Home/Teacher/reward'));
        }else{
               $this->error('没有更新',U('Home/Teacher/reward'));
        }
   }
   /**
    * 删除一条奖惩信息
    * @return [type] [description]
    */
   public function delReward(){
        $id = $_GET[id];
        $mas = new MassageModel();
        $s=$mas->delReward($id);
        if($s>0){
              $this->success('删除成功',U('Home/Teacher/reward'));
        }else{
               $this->error('删除失败',U('Home/Teacher/reward'));
        }
   }
}
