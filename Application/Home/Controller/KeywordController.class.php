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

    // public function update()
    // {
    //     $k_id=$_POST['k_id'];
    //     $keyword=$_POST['keyword'];
    //     $keyword=M('Keyword');
    //     $msg=$keyword->where('k_id='.$k_id)->setField('keyword',$keyword);
    //     if($msg){
    //         echo 1;
    //     }else{
    //         echo 0;
    //     }
    // }

    public function update()
    {
        $k_id=$_POST['k_id'];
        $link=$_POST['link'];
        $keyword=M('Keyword');
        $msg=$keyword->where('k_id='.$k_id)->setField('l_link',$link);
        if($msg){
            echo 1;
        }else{
            echo 0;
        }

    }

    //======================== = 删 除 = ===================================================
    public function del()
    {
        $k_id=$_POST['k_id'];
        $keyword=M('Keyword');
        $msg=$keyword->where('k_id='.$k_id)->delete();
        if($msg){
            echo 1;
        }else{
            echo 0;
        }

    }
}