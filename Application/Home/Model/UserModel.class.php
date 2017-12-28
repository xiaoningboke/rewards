<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
    /**
     * 返回一个用户的信息
     * @param  [type] $identify [description]
     * @param  [type] $number   [description]
     * @return [type]           [description]
     */
    public function respersonal($identify,$number){
        $user = M('User');
        $where = array('identify'=>$identify,'number'=>$number);
        $userDate = $user->where($where)->find();
        return $userDate;
    }
    /**
     * 修改个人信息
     * @param  [type] $id    [description]
     * @param  [type] $name  [description]
     * @param  [type] $sex   [description]
     * @param  [type] $email [description]
     * @return [type]        [description]
     */
    public function exitpersonal($id,$number,$name,$sex,$email){
        $user = M('User');
        $data['id'] = $id;
        $data['name'] = $name;
        $data['sex'] = $sex;
        $data['email'] = $email;
        $s = $user->where("id=$id")->save($data); 
        return $s;
    }
    /**
     * 修改密码
     * @param  [type] $id       [description]
     * @param  [type] $password [description]
     * @return [type]           [description]
     */
    public function exitpassword($id,$password){
        $user = M('User');
        $data['id'] = $id;
        $data['password'] = $password;
        $s = $user->where("id=$id")->save($data);
        return $s;
    }
    /**
     * 返回所有学生信息
     * @return [type] [description]
     */
    public function secstudent(){
        $user = M('User');
        $studentData = $user->where("identify=2")->select();
        return $studentData;
    }
    /**
     * 查询一条学生信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function findStudent($id){
        $user = M('User');
        $studentData = $user->where("id=$id")->find();
        return $studentData;
    }
    /**
     * 添加一个学生信息
     * @param  [type] $number [description]
     * @param  [type] $name   [description]
     * @param  [type] $sex    [description]
     * @param  [type] $email  [description]
     * @return [type]         [description]
     */
    public function addstudent($number,$name,$sex,$email){
        $user = M('User');
        $data['number'] = $number;
        $data['name'] = $name;
        $data['sex'] = $sex;
        $data['email'] = $email;
        $data['identify'] = 2;
        $s=$user->add($data);
        return $s;
    }
    /**
     * 删除一个学生
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delstudent($id){
        $user = M('User');
        $s=$user->where("id=$id")->delete();
        return $s;
    }
}