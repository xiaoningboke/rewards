<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\UserModel;

class AdminController extends Controller {
    public function index(){
        $this->display();
    }
}