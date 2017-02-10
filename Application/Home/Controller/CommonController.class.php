<?php
namespace Home\Controller;
use Home\Model;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/14
 * Time: 16:21
 */
class CommonController extends Controller
{
    /**
     * CommonController constructor.  判断用户是否登录
     */
    public function __construct()
    {
        parent::__construct();
       if(!empty($_SESSION['userinfo']["u_id"]))
       {
           $user_id=$_SESSION['userinfo']["u_id"];
           $this->left();
       }else{
          $user_id='false';
       };
        if( $user_id == 'false'){
            if(empty($_POST['name']) && $user_id=='false')
            {
                $this->log();
            }
        }

    }

    /**
     * 登录页面
     */
    public function log(){
        layout(false);
        $this->display('Comm/login');
        exit;
    }

    /**
     * 登录验证
     */
    public function login()
    {
       $name=$_POST['name'];
        $pwd=md5($_POST['pwd']);
        $User=D('User');
        $msg=$User->check($name,$pwd);

            if ($msg) {
                if($_SESSION['userinfo']['u_state']) {
                    $this->success("登录成功", U('Index/index'));
                }else{
                    $this->error("您的账户已被禁用，请联系管理员");
                }
            } else {
                $this->error("登录失败，请联系管理员检查账号");
            }
    }

    /**
     * 退出
     */
    public function logout()
    {
        $a=$_SESSION;
        session_destroy();
        header("Location: log");
        exit;
    }

    public function left()
    {
        $role=$_SESSION['userinfo']['r_id'];
        $r_name=M('Role')->where('r_id='.$role)->getField(r_name);
        $this->assign('r_name',$r_name);
        if($role>2){
            $projects=D('Project');
            $where['u_id']=$_SESSION['userinfo']['u_id'];
            $allProject=$projects->allProject($where);
            $this->assign('project',$allProject);
        }

    }
}