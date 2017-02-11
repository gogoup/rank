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
       $this->assign('list',$linkinfo);
       $this->display();
   }




}