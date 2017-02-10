<?php
namespace Home\Model;
use Think\Model;

class UserModel extends Model
{
    private $User;

    public function _initialize()
    {
        $this->User=M('User');
    }

    /**
     * @param string $name
     * @param mixed $pwd
     * @return bool
     * 检查用户登录信息
     */
    public function check($name,$pwd)
    {
        $log['u_name']=$name;
        $log['u_pwd']=$pwd;
        $userinfo=$this->User->where($log)->find();
        $_SESSION['userinfo']=$userinfo;
        if($userinfo)
        {
            return $msg=ture;
        }else{
            return $msg=false;
        }
    }

    /**
     * @param $team_id
     * @return mixed
     * 获取团队信息
     * 目前相对简陋所以返回数组格式
     */
    public function getteam($team_id)
    {
     $teaminfo=$this->Team->where('team_id='.$team_id)->find();
        return $teaminfo;
    }

    /**
     * @param $u_id
     * @return mixed
     * 获取员工信息
     * 目前相对简陋所以返回数组格式
     */
    public function getuser($u_id)
    {
     $userinfo=$this->User->where('u_id='.$u_id)->find();
        return $userinfo;
    }

}