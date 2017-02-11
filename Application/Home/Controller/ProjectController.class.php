<?php
namespace Home\Controller;
use Think\Controller;

class ProjectController extends  CommonController
{
    private $Project;
    private $Team;
    public function _initialize()
    {
        $this->Project=D('Project');
        $this->Team=D('Team');
    }

    /**
     * 项目首页
     * 根据角色id判断显示的项目
     */
    public function index()
    {
        $role=$_SESSION['userinfo']['r_id'];
        switch($role)
        {
            case 1;
                $count=$this->Project->allProjectCount();
                $where=null;
                break;
            case 2;
                $where['team_id']=$_SESSION['userinfo']['team_id'];
                $count=$this->Project->allProjectCount($where);
                break;
        }
        $Page = new \Think\Page($count,10);
        $show= $Page->show();
        $list = $this->Project->where($where)->order('p_id')->limit($Page->firstRow.','.$Page->listRows)->select();
       $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    public function update()
    {
        $r_id=$_SESSION['userinfo']['r_id'];
        $p_id=$_GET['p_id'];
        $where['p_id']=$p_id;
        $list=$this->Project->oneProject($where);
        $t_id=$list['t_id'];
        if($r_id==2) {
            $teamwhere['t_id'] = $t_id;
            $teaminfo = $this->Team->oneTeam($teamwhere);
        }else{
            //超级管理员显示所有团队
            $teaminfo=$this->Team->allTeam();
        }

        //权限问题为确定  暂停


        $this->display();
    }




















}