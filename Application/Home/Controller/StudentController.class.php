<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\UserModel;

class StudentController extends Controller {
    /**
     * 显示首页
     * @return [type] [description]
     */
    public function index(){
        $this->display();
    }
    /**
     * 显示主题内容
     * @return [type] [description]
     */
    public function main(){
        $this->display();
    }
    public function infomation(){

        if($_GET['p']==NULL){
        $p=1;
        }else{
            $p=$_GET['p'];
        }
        $this->display();
    }

}