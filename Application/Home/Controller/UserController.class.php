<?php
namespace Home\Controller;
use Think\Controller;
use Home\Controller\CommonController;
class UserController extends CommonController {

	/*
	*用户组
	*/
    public function index(){
    	$team = M('Team');  
        $info=$team->select();
        $this->assign('info', $info);  
        $this->display(); 
    }

    /*
	*用户组下面的员工
	*/
    public function user(){
    	$user = M('User');
    	$team = M('Team');
    	$ta=$_GET['team_id'];
        $list=$user->where("team_id=".$ta)->select();
        $info=$team->where("t_id=".$ta)->select();
        $this->assign('info', $info);  
        $this->assign('list', $list);  
        $this->display(); 
    }


    /*
	*团队  修改  显示
	*/
    public function update(){
    	$team = M('Team');
    	$ta=$_GET['team_id'];  
        $info=$team->where("t_id=".$ta)->select();
        $this->assign('info', $info);  
        $this->display(); 
    }

     public function update1(){
    	$team = M('Team');
    	$data["t_id"] = $_POST["t_id"];
    	$t_id = $_POST["t_id"];
	    $data["t_name"] = $_POST["t_name"];
	    $data["t_state"] = $_POST["t_name"];
	    $data["t_state"] = $_POST["t_state"];
	    $upinfo = $team->where('t_id='.$t_id)->save($data);
	    if($upinfo){
	        $this->success("修改成功", U('User/index'));
	    } else {
	        $this->error('数据写入错误！');
	    } 
    }

    /*
	*团队  添加
	*/
    public function teamadda(){
    	 $team = M("Team");

	    // 构建写入的数据数组
	    $data["t_name"] = $_POST["t_name"];
	    $data["t_state"] = $_POST["t_state"];

	    // 写入数据
	    if($lastInsId = $team->add($data)){
	        $this->success("添加成功", U('User/index'));
	        // echo "<script> alert('添加成功'); </script>";
	        // header("location:".U('User/index'));
	    } else {
	        $this->error('数据写入错误！');
	    }
	}


	/*
	*用户  添加
	*/
    public function useradd(){
      	$team = M("Team");
    	$teaminfo=$team->select();
    	$this->assign('list', $teaminfo);
    	$this->display();
	}

	public function useradda(){
    	$user = M("User");
    	$data[u_name] = $_POST["u_name"];
    	$data[u_pwd] = $_POST["u_pwd"];
    	$data[u_state] = $_POST["u_state"];
    	$data[r_id] = $_POST["r_id"];
    	$data[team_id] = $_POST["team"];
	    // 写入数据
	    if($lastInsId = $user->add($data)){
	        $this->success("添加成功", U('User/index'));
	    } else {
	        $this->error('数据写入错误！');
	    }    
	}

    /*
	*用户  修改
	*/
    public function userupd(){
    	$user = M('User');
        $team = M('Team');
    	$ta=$_GET['u_id'];
        $b = $_GET['team_id'];
        
        $info=$user->where("u_id=".$ta)->select();
        $list=$team->select(); 
        //var_dump($list);exit;
        $this->assign('team_id',$b);   
        $this->assign('info', $info);
        $this->assign('list', $list);  
        $this->display(); 
    }

    public function userupda(){
        $user = M('User');
        $data["u_id"] = $_POST["u_id"];
        $u_id = $_POST["u_id"];
        $data["team_id"] = $_POST["team"];
        $data["u_name"] = $_POST["u_name"];
        $data["u_pwd"] = $_POST["u_pwd"];
        $data["u_state"] = $_POST["u_state"];
        $upinfo = $user->where('u_id='.$u_id)->save($data);
        if($upinfo){
            $this->success("修改成功", U('User/index'));
        } else {
            $this->error('数据写入错误！');
        } 
    }

	/*
	*用户组  删除
	*/
    function zudel()
	{
		$user = M('User');
		$team = M('Team');
    	$a = $_GET['t_id'];
    	// echo "<script>alert('里面有其他用户！删除时请谨慎！！！')</script>";

    	$lihai = $user->where("team_id=".$a )->delete();
        // $list=$team->where("t_id=".$teams)->delete();
        if($lihai){
        	$list=$team->where("t_id=".$a)->delete();
        	if ($list) {
        		$this->success("删除成功", U('User/index'));
        	}
	    } else {
	        $this->error('数据写入错误！');
	    } 
	}

	/*
	*用户  删除
	*/
    function userdel()
	{
		$user = M('User');
    	$users = $_GET['u_id'];
    	$list=$user->where("u_id=".$users)->delete();
        if($list){
	        $this->success("删除成功", U('User/index'));
	    } else {
	        $this->error('数据写入错误！');
	    } 
	}
}