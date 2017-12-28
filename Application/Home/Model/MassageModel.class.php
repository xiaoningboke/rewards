<?php
namespace Home\Model;
use Think\Model;
class MassageModel extends Model {

    /**
     * 查询所有的奖惩信息
     * @return [type] [description]
     */
    public function selMassage(){
        $mas = M('Massage');
        $masDate = $mas->select();
        return $masDate;
    }
    /**
     * 查询一条奖惩信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function findMassage($id){
        $mas = M('Massage');
        $masDate = $mas->where("id=$id")->find();
        return $masDate;
    }
    /**
     * 添加奖惩信息
     * @param [type] $title         [description]
     * @param [type] $name          [description]
     * @param [type] $time          [description]
     * @param [type] $type          [description]
     * @param [type] $encouragemess [description]
     */
    public function addMassage($title,$name,$time,$type,$encouragemess){
        $mas = M('Massage');
        $data['title'] = $title;
        $data['name'] = $name;
        $data['time'] = $time;
        $data['type'] = $type;
        $data['encouragemess'] = $encouragemess;
        $s=$mas->add($data);
        return $s;
    }
    /**
     * 修改奖惩信息
     * @param  [type] $id            [description]
     * @param  [type] $title         [description]
     * @param  [type] $name          [description]
     * @param  [type] $type          [description]
     * @param  [type] $time          [description]
     * @param  [type] $encouragemess [description]
     * @return [type]                [description]
     */
    public function editReward($id,$title,$name,$type,$time,$encouragemess){
        $mas = M('Massage');
        $data['id'] = $id;
        $data['title'] = $title;
        $data['name'] = $name;
        $data['type'] = $type;
        $data['time'] = $time;
        $data['encouragemess'] = $encouragemess;
        $s = $mas->where("id=$id")->save($data); 
        return $s;
    }
    /**
     * 删除一条奖惩信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function delReward($id){
        $mas = M('Massage');
        $s=$mas->where("id=$id")->delete();
        return $s;
    }
    public function tReward(){
        $mas = M('Massage');
        $masDate = $mas->where('type!="班主任不通过"')->select();
        return $masDate;
    }
}