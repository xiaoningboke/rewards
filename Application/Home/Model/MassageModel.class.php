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
}