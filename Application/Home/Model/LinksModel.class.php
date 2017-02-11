<?php
namespace  Home\Model;
use Think\Model;

class LinksModel extends Model
{
   private $Link;

    public function _initialize()
    {
        $this->Link=M('Links');
    }

    /**
     * @param $where
     * @return mixed   二维数组
     * 返回符合条件的所有数据
     */
    public function allLink($where)
    {
        return $this->Link->where($where)->select();
    }




























}

