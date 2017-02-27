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
        $Page = new \Think\Page($count,20);
        $show= $Page->show();
        $list = $this->Project->where($where)->order('p_id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    // public function update原来()
    // {
    //     $r_id=$_SESSION['userinfo']['r_id'];
    //     $p_id=$_GET['p_id'];
    //     $where['p_id']=$p_id;
    //     $list=$this->Project->oneProject($where);
    //     $t_id=$list['t_id'];
    //     if($r_id==2) {
    //         $teamwhere['t_id'] = $t_id;
    //         $teaminfo = $this->Team->oneTeam($teamwhere);
    //     }else{
    //         //超级管理员显示所有团队
    //         $teaminfo=$this->Team->allTeam();
    //     }

    //     //权限问题为确定  暂停


    //     $this->display();
    // }

    //============================================ 修 改 =========================================================
    public function update()
    {
        $project = M('Project');
        $team = M('Team');
        $user = M('User');
        $u_p = M('User_project');
        $p_id = $_GET['p_id'];

        //      用户组
        $r_id = $_SESSION['userinfo']['r_id'];
        if($r_id==1) {
            $t = $project->where('p_id='.$p_id)->getField('team_id');
            $teaml = $team->select();
        }else{
            $t = $project->where('p_id='.$p_id)->getField('team_id');
            $teaml = $team->where('t_id='.$t)->select();
        }

        $list = $user->where('team_id='.$t)->select();
        $info = $project->where('p_id='.$p_id)->select();
        
        $this->assign('count',$count);
        $this->assign('team_id',$t);
        $this->assign('list',$list);
        $this->assign('teaml',$teaml);
        $this->assign('info',$info); 
        $this->display();
        
        
    }

    public function update1()
    {
        $project = M('Project');
        $team = M('Team');
        $user = M('User');
        $u_p = M('User_project');

        $data["p_id"] = $_POST['p_id'];
        $data["p_card"] = $_POST['p_card'];
        $data["p_name"] = $_POST['p_name'];
        $data["team_id"] = $_POST['team'];
        $data["u_id"] = $_POST['user'];

        //print_r($data);die();
        
        //$count = $u_p->where('p_id='.$p_id)->count();
        $pinfo = $project->where('p_id='.$data["p_id"])->save($data);
        if($pinfo){
            $upinfo = $u_p->where('p_id='.$data["p_id"])->save($data);
            if ($upinfo) {
                $this->success("修改成功", U('Project/index'));
            }else{
               $this->error('参数写入错误！'); 
            }
        } else {
            $this->error('数据写入错误！');
        }
    }

    //============================================= = 添 加 = =========================================================
    public function add()
    {
        $team = M('Team');
        $user = M('User');

        $rid = $_SESSION['userinfo']['r_id'];
        $team_id = $_SESSION['userinfo']['team_id'];

        if ($rid=='1') {
            $info = $team->select();
            $list = $user->select();
        }else{
            $info = $team->where('t_id='.$team_id)->select();
            $list = $user->where('team_id='.$team_id)->select();
        }
        
        $this->assign('info',$info);
        $this->assign('list',$list); 
        $this->display();    
    }

    public function adda()
    {
        $project = M('Project');
        $team = M('Team');
        $user = M('User');
        $u_p = M('User_project');

        $data[p_name] = $_POST["p_name"];
        $data[p_card] = $_POST["p_card"];
        $data[team_id] = $_POST["team"];
        $data[u_id] = $_POST["user"];

        $pinfo = $project->add($data);
        
        if ($pinfo) {
            $data[p_id] = $project->where('p_card='.$data[p_card])->getField('p_id');
            $ok = $u_p->add($data);
            
            if ($ok) {
                $this->success("添加成功", U('Project/index'));
            }else{
                $this->error('参数写入错误！');
            }
        } else {
            $this->error('数据写入错误！');
        }     
    }

    //============================================= = 删 除 = =========================================================
    public function del()
    {
        $a = $_GET['p_id'];
        // echo $p_id;exit();
        $Project = M('Project');
        $Project->startTrans();//启动事务 

        $keyword = M('Keyword');
        $link = M('Links');
        $u_p = M('User_project');

        $count = $keyword->where('p_id='.$a)->count();
        $count1 = $link->where('p_id='.$a)->count();

        echo $n = "<script>confirm('里面的数组什么的都确定删除么？')</script>";
        echo $n;exit();
        if ($n=true) {
           echo "1";exit();
        }else{
            echo "22222222222";exit();
        }

        if ($count==0) {
            if ($count1==0) {
                $list4 = $u_p->where("p_id=".$a)->delete();   
                $list = $Project->where("p_id=".$a)->delete();
                if ($list && $list4) {
                    $Project->commit(); //事务提交
                    $this->success("删除成功", U('Project/index'));
                }else{
                    $Project->rollback();//事务回滚
                    $this->error('删除失败！');
                }
            }else{
                $list4 = $u_p->where("p_id=".$a)->delete();   
                $list = $Project->where("p_id=".$a)->delete();
                $list3 = $link->where("p_id=".$a)->delete();
                if ($list && $list4 && $list3) {
                    $Project->commit(); //事务提交
                    $this->success("删除成功", U('Project/index'));
                }else{
                    $Project->rollback();//事务回滚
                    $this->error('删除失败！');
                }
            }
        }else{
            $list2 = $keyword->where("p_id=".$a)->delete();
            $list3 = $link->where("p_id=".$a)->delete();
            $list4 = $u_p->where("p_id=".$a)->delete();   
            $list = $Project->where("p_id=".$a)->delete();
            if($list && $list2 && $list4 && $list3){
                $Project->commit(); //事务提交
                $this->success("删除成功", U('Project/index'));
            } else {
                $Project->rollback();//事务回滚
                $this->error('删除失败！');
            }
        }    
    }

}