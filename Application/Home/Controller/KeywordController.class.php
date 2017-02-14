<?php
namespace Home\Controller;
use Think\Controller;

class KeywordController extends  CommonController
{
    public function Index()
    {
        $l_id=$_GET['l_id'];

        $words=D('Keyword');
        $where['l_id']=$l_id;
        $keywords=$words->getall($where);
        $count=count($keywords);
        $Page=new \Think\Page($count,1);
        $show=$Page->show();
        $list = $words->where($where)->order('k_id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $lists=array();
        foreach($list as $key=>$value)
        {
         $rank=$words->getrank($value['k_id']);
            $list[$key]['rank']=$rank;
            $lists=$list;
        }
        $this->assign('list',$lists);
        $this->assign('page',$show);

        $this->display();
    }
}