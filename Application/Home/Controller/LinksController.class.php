<?php
namespace  Home\Controller;
use Think\Controller;

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
        $linkinfo = $this->Links ->allLink($where);
       $count=count($linkinfo);
       $Page=new \Think\Page($count,30);
       $show=$Page->show();
       $list = $this->Links->where($where)->order('l_id')->limit($Page->firstRow.','.$Page->listRows)->select();
       $this->assign('list',$linkinfo);
       $this->assign('page',$show);
       $this->display();
   }




}