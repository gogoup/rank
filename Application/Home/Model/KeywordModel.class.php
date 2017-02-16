<?php
namespace  Home\Model;
use Think\Model;

class KeywordModel extends Model
{
    private $rank;

    public function _initialize()
    {
        $this->rank=M('Ranking');
    }

    /**
     * @param $where
     * @return mixed
     * 返回所有符合条件的关键词
     */
    public function getall($where)
    {
        return $this->where($where)->select();
    }

    public  function getLikeKeyword($p_id,$keyword)
    {
        $sql="select * from rank_keyword where p_id=".$p_id." and  keyword like '%".$keyword."%'";
        return $this->query($sql);
    }
}