<?php
namespace Home\Model;
use Think\Model;

class  ProjectModel extends Model
{
    private $Project;
    private $UserProject;

    public function _initialize()
    {
        $this->Project=M('Project');
        $this->UserProject=M('UserProject');
    }

    /**
     * @param $where
     * @return mixed    二维数组
     * 返回符合条件的所有项目ID
     */
    public function allProjectId($where)
    {
        return $this->UserProject->where($where)->select();
    }

    /**
     * @param $where
     * @return mixed   二维数组
     * 返回符合条件的所有项目信息
     */
    public function allProject($where)
    {
        return $this->Project->where($where)->select();
    }

    public function allProjectCount($where)
    {
        return $this->where($where)->count();
    }

    /**
     * @param $where
     * @return mixed  一维数组
     * 返回符合条件的一条项目信息
     */
    public function oneProject($where)
    {
        return $this->Project->where($where)->find();
    }








}