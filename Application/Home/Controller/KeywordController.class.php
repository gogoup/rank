<?php
namespace Home\Controller;
use Think\Controller;

class KeywordController extends Controller
{
    public function Index()
    {
        $p_id=$_GET['p_id'];
        $words=D('Keyword');
        if($_GET['condition2'])
        {
            $list=$words->getLikeKeyword($p_id,$_GET['condition2']);
            $list2=json_encode($list);
            echo $list2;
        }else{
            $where['p_id']=$p_id;
            $keywords=$words->getall($where);
            $count=count($keywords);
            $Page=new \Think\Page($count,50);
            $show=$Page->show();
            $list = $words->where($where)->order('k_id')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('page',$show);
            $this->assign('list',$list);
        }
    }
}