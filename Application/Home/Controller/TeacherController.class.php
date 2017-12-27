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
        $s=$user->exitpersonal($id,$number,$name,$sex,$email);
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
    public function addRewards(){
        var_dump($_POST);
    }

    /**
     * 富文本编辑器
     * @return [type] [description]
     */
    public function save_info(){  
   $ueditor_config = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "",     file_get_contents("./Public/Ueditor/php/config.json")), true);  
        $action = $_GET['action'];  
        switch ($action) {  
            case 'config':  
                $result = json_encode($ueditor_config);  
                break;  
                /* 上传图片 */  
            case 'uploadimage':  
                /* 上传涂鸦 */  
            case 'uploadscrawl':  
                /* 上传视频 */  
            case 'uploadvideo':  
                /* 上传文件 */  
            case 'uploadfile':  
                $upload = new \Think\Upload();  
                $upload->maxSize = 3145728;  
                $upload->rootPath = './Public/Uploads/';  
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');  
                $info = $upload->upload();  
                if (!$info) {  
                    $result = json_encode(array(  
                            'state' => $upload->getError(),  
                    ));  
                } else {  
                    $url = __ROOT__ . "/Public/Uploads/" . $info["upfile"]["savepath"] . $info["upfile"]['savename'];  
                    $result = json_encode(array(  
                            'url' => $url,  
                            'title' => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),  
                            'original' => $info["upfile"]['name'],  
                            'state' => 'SUCCESS'  
                    ));  
                }  
                break;  
            default:  
                $result = json_encode(array(  
                'state' => '请求地址出错'  
                        ));  
                        break;  
        }  
        /* 输出结果 */  
        if (isset($_GET["callback"])) {  
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {  
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';  
            } else {  
                echo json_encode(array(  
                        'state' => 'callback参数不合法'  
                ));  
            }  
        } else {  
            echo $result;  
        }  
    }  
}
