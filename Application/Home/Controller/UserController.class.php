<?php
namespace Home\Controller;
use Think\Controller;
use Home\Controller\CommonController;
class UserController extends CommonController {
    public function index(){
    	$user = D('User');  
        $info=$user->select();  
        $this->assign('info', $info);  
        $this->display(); 
    }

}