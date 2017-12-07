<?php
namespace Home\Model;
use Think\Model;
class StudentModel extends Model {
    public function resStudent(){
            $student = M('User');
            $studentDate = $user->where("identify=0")->select();
            return $studentDate;
        }
}