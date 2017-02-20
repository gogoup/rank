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
        $user = M('User');
        $a = $_SESSION['userinfo']['u_id'];
        $r_id = $user->where('u_id='.$a)->getField('r_id');
        $b = $user->where('u_id='.$a)->getField('team_id');
        // echo $b;exit();
        if($r_id==1){
            $info=$team->select();
            $this->assign('info', $info);  
            $this->display();
        }elseif ($r_id==2) {
            $info=$team->where('t_id='.$b)->select();
            $this->assign('info', $info);  
            $this->display();
        }
    }

    public function people(){
        $user = M('User');
        $team = M('Team');
        $ta = $_SESSION['userinfo']['u_id'];
        $t = $user->where('u_id='.$ta)->getField('team_id');
        $info = $team->where('t_id='.$t)->select();
        $list=$user->where("u_id=".$ta)->select();
        $this->assign('info',$info);
        $this->assign('list', $list);  
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
	    } else {
	        $this->error('数据写入错误！');
	    }
	}


	/*
	*用户  添加
	*/
    public function useradd(){
      	$team = M("Team");
        $a = $_GET['team_id'];
        $b = $_SESSION[userinfo]['r_id'];
        // echo $b;exit();


        if ($b=='1') {
            $teaminfo=$team->select();
            $this->assign('list', $teaminfo);
            $this->display();
        }else{
            $teaminfo=$team->where('t_id='.$a)->select();
            $this->assign('list', $teaminfo);
            $this->display();
        }
	}

	public function useradda(){
    	$user = M("User");
        $b = $_SESSION[userinfo]['team_id'];
        // echo $b;exit();
    	$data[u_name] = $_POST["u_name"];
    	$data[u_pwd] = md5($_POST["u_pwd"]);
    	$data[u_state] = $_POST["u_state"];
    	$data[r_id] = $_POST["r_id"];
    	$data[team_id] = $_POST["team"];
        // echo $data[team_id];exit();
	    // 写入数据
	    if($lastInsId = $user->add($data)){
	        $this->success("添加成功", U('User/user',array('team_id'=>$_SESSION[userinfo]['team_id'])));
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
        $Count = $user->where('team_id='.$a)->count();
        if ($Count==0){
            echo "<script>alert('用户组里面没有数据！')</script>";
            $list=$user->where("team_id=".$a)->delete();
            $info=$team->where("t_id=".$a)->delete();
            $this->success("删除成功", U('User/index'));
        }else{
            echo "<script>alert('里面有其他用户！删除时请谨慎！！！')</script>";
            $lihai = $user->where("team_id=".$a )->delete();
            if($lihai){
                $list=$team->where("t_id=".$a)->delete();
                if ($list) {
                    $this->success("删除成功", U('User/index'));
                }else{
                    $this->error('数据写入错误！！！');
                }
            }else{
                $this->error('数据写入错误！');
            } 
        }
    	
	}

	/*
	*用户  删除
	*/
    function userdel()
	{
		$user = M('User');
    	$users = $_GET['u_id'];
        $ta = $_SESSION['userinfo']['r_id'];
        if ($ta == '1') {
            $list=$user->where("u_id=".$users)->delete();
            if($list){
                $this->success("删除成功", U('User/user',array('team_id'=>$_SESSION[userinfo]['team_id'])));
            } else {
                $this->error('数据写入错误！');
            }
        }else{
            $this->error('你没有删除的权限！');
        }
	}
}