<?php
namespace  Home\Controller;
use Think\Controller;
use Think\Hook;

class LinksController extends CommonController
{
    private  $Links;
    private $Project;
    private $Ranking;
    private $Keyword;
    public function _initialize()
    {
        $this->Links=D('Links');
        $this->Project=D('Project');
        $this->Ranking=D('Ranking');
        $this->Keyword=D('Keyword');
    }

   public function index()
   {
       $where['p_id']=$_GET['p_id'];
       $project=D('Project')->getProname($where);

       if($_GET['condition1'])
       {
           $l_link=$_GET['condition1'];
           $linkinfo1=$this->Links->getLikeLink($_GET['p_id'],$l_link);
       }else{
           $linkinfo = $this->Links ->allLink($where);
           $count=count($linkinfo);
           $Page=new \Think\Page($count,30);
           $show=$Page->show();
           $linkinfo1= $this->Links->where($where)->order('l_id')->limit($Page->firstRow.','.$Page->listRows)->select();
           $this->assign('page1',$show);
       }


        if($linkinfo1){
            $this->assign('list1',$linkinfo1);
        }else{
            echo "<script>alert('数据搜索结果为0'); window.history.go(-1);</script>";
        }

       $this->assign('project',$project);



       $keyword=new KeywordController();
       $keyword->index();

       $this->rank();

       $this->display();
   }

    public function rank()
    {
        //我直接循环关键字表  然后把项目id跟关键字id做条件去排名表里去查   没有就显示为空
        $where['p_id']=$_GET['p_id'];
        $allK_id=$this->Keyword->allK_id($where);
        $rankinfo=array();
        foreach($allK_id as $key=>$value)
        {
            $k_id=$value;
            $ranks=$this->Ranking->allRank7($k_id);
            $rankinfo[]=$ranks;
        }
        $day=array(
            0=>date("Y-m-d"),
            1=>date("Y-m-d",strtotime('-1 day')),
            2=>date("Y-m-d",strtotime('-2 day')),
            3=>date("Y-m-d",strtotime('-3 day')),
            4=>date("Y-m-d",strtotime('-4 day')),
            5=>date("Y-m-d",strtotime('-5 day')),
            6=>date("Y-m-d",strtotime('-6 day')),
        );
        $html="<thead>
                    <tr>
                        <th>关键词\日期</th>
                         ";
        foreach($day as $day1)
        {
            $html.="<th>".substr($day1,5)."</th>";
        }
        $html.="     </tr>
                </thead>";
        foreach($rankinfo as $key1=>$value1)
        {
            $html.="<tbody>
                    <tr>";
            $html.="<th>".$value1['keyword']."</th>";
              foreach($day as $day2)
              {
                  $html.="<th>".$value1[$day2]."</th>";
              }
            $html.="    </tr>
                </tbody>";
        }

        $this->assign('rank',$html);

    }


    /**
     * 域名修改
     */
    public function update()
    {
        $l_id=$_POST['l_id'];
        $link=$_POST['link'];
        $Links=M('Links');
        $msg=$Links->where('l_id='.$l_id)->setField('l_link',$link);
        if($msg){
            echo 1;
        }else{
            echo 0;
        }

    }




}