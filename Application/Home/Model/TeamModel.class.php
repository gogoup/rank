<?php
namespace Home\Model;
use Think\Model;

class teamModel extends Model
{
    private $Team;
     public function _initialize()
     {
         $this->Team=M('Team');
     }

    /**
     * @param $where
     * @return mixed  一维数组
     * 返回符合条件的一条数据
     */
    public function oneTeam($where)
    {
        return $this->Team->where($where)->find();
    }

    /**
     * @param $where
     * @return mixed  二维
     * 返回符合条件的所有数据
     */
    public function allTeam($where)
    {
        return $this->Team->where($where)->select();
    }

}