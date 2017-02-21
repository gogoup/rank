<?php
namespace Home\Controller;
use Think\Controller;

class RankController extends CommonController
{
    public function link()
    {
        layout(false);
        $l_id=$_GET['l_id'];
        $p_id=$_GET['p_id'];
        $old=array(
            date('Y-m-d'),
            date('Y-m-d',strtotime('-1 day')),
            date('Y-m-d',strtotime('-2 day')),
            date('Y-m-d',strtotime('-3 day')),
            date('Y-m-d',strtotime('-4 day')),
            date('Y-m-d',strtotime('-5 day')),
            date('Y-m-d',strtotime('-6 day')),
        );
        $linkRank=M('Ranking');
        $sql="SELECT `k_id`,`time`,`rank`,`keyword` FROM rank_ranking WHERE p_id=$p_id AND l_id=$l_id AND `time` BETWEEN '$old[6]' AND '$old[0]' ORDER BY `time` ASC";
        $linkinfo=$linkRank->query($sql);
       $list=array();
        foreach($linkinfo as $info)
       {
            $list[$info['k_id']]['keyword']=$info['keyword'];
            $list[$info['k_id']][$info['time']]=$info['rank'];
       }
        $html='';
        foreach($list as $value)
        {
            $html.="<tr>
                    <td>".$value['keyword']."</td>";
                foreach($old as $day)
                {
                    $html.="<td>".$value[$day]."</td>";
                }
            $html.="</tr>";
        }
        $this->assign('html',$html);
        $this->assign('time',$old);

        $this->display();
    }





    public function keyword()
    {
        layout(false);

        $k_id=$_GET['k_id'];
        $p_id=$_GET['p_id'];
        $old=array(
            date('Y-m-d'),
            date('Y-m-d',strtotime('-1 day')),
            date('Y-m-d',strtotime('-2 day')),
            date('Y-m-d',strtotime('-3 day')),
            date('Y-m-d',strtotime('-4 day')),
            date('Y-m-d',strtotime('-5 day')),
            date('Y-m-d',strtotime('-6 day')),
        );
        $linkRank=M('Ranking');
        $sql="SELECT `k_id`,`time`,`rank`,`link` FROM rank_ranking WHERE p_id=$p_id AND k_id=$k_id AND `time` BETWEEN '$old[6]' AND '$old[0]' ORDER BY `time` ASC";
        $linkinfo=$linkRank->query($sql);
        $list=array();
        foreach($linkinfo as $info)
        {
            $list[$info['k_id']]['link']=$info['link'];
            $list[$info['k_id']][$info['time']]=$info['rank'];
        }
        $html='';
        foreach($list as $value)
        {
            $html.="<tr>
                    <td>".$value['link']."</td>";
            foreach($old as $day)
            {
                $html.="<td>".$value[$day]."</td>";
            }
            $html.="</tr>";
        }
        $this->assign('html',$html);
        $this->assign('time',$old);

        $this->display();
    }


}