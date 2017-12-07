<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
    public function resPassword($identify,$number){
            $user = M('User');
            $userDate = $user->where("identify=$identify AND number=$number")->find();
            return $userDate;
        }
     public function resStudent(){
            $student = M('User');
            $studentDate = $user->where("identify=0")->select();
            return $studentDate;
        }
}