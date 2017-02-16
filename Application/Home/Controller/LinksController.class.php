<?php
namespace  Home\Controller;
use Think\Controller;
use Think\Hook;

class LinksController extends CommonController
{
    private  $Links;
    public function _initialize()
    {
        $this->Links=D('Links');
    }

   public function index()
   {
       $where['p_id']=$_GET['p_id'];
       $project=D('Project')->getProname($where);

       if($_GET['condition1'])
       {
           $l_link=$_GET['condition1'];
           $linkinfo1=$this->Links->getLikeLink($_GET['p_id'],$l_link);
       }else{
           $linkinfo = $this->Links ->allLink($where);
           $count=count($linkinfo);
           $Page=new \Think\Page($count,30);
           $show=$Page->show();
           $linkinfo1= $this->Links->where($where)->order('l_id')->limit($Page->firstRow.','.$Page->listRows)->select();
           $this->assign('page1',$show);
       }


        if($linkinfo1){
            $this->assign('list1',$linkinfo1);
        }else{
            echo "<script>alert('数据搜索结果为0'); window.history.go(-1);</script>";
        }

       $this->assign('project',$project);



       $keyword=new KeywordController();
       $keyword->index();

       $this->display();
   }




}