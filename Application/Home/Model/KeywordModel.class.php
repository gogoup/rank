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

    public function getrank($k_id)
    {
        $sql="select rank from rank_ranking where k_id=".$k_id." order by time desc limit 1";
       $aa= $this->rank->query($sql);
        return $aa[0]['rank'];
    }
}