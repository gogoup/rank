<?php
namespace Home\Controller;
use Think\Controller;

class RankController extends CommonController
{
    /**
     * 域名排名
     */
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


    /**
     * 关键字排名
     */
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


    public function deltab()
    {
        echo "<script>alert('此操作为不可逆操作，请点击确认继续。')</script>";
        $con=mysql_connect('localhost','root','root');
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db('ycranking',$con);
        $time=date('Y-m-d');
        $sql="alter table `rank_ranking` rename `ranking".$time."`";
        $a=mysql_query($sql);
        if($a) {
            $createTab = "CREATE TABLE `rank_ranking` (
                        `r_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '排名id',
                        `p_name` varchar(255) DEFAULT NULL COMMENT '项目名',
                        `p_id` int(10) DEFAULT NULL COMMENT '项目ID',
                        `browser` varchar(255) DEFAULT NULL COMMENT '搜索引擎',
                        `time` date DEFAULT NULL COMMENT '日期',
                        `keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
                        `k_id` int(10) DEFAULT NULL COMMENT '关键字排名',
                        `link` varchar(255) DEFAULT NULL COMMENT '连接',
                        `l_id` int(10) DEFAULT NULL COMMENT '链接ID',
                        `rank` int(10) DEFAULT NULL COMMENT '排名',
                         PRIMARY KEY (`r_id`)
                        ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";
            $b = mysql_query($createTab);
            if ($b)
            {
                $this->success("排名表已清空，数据库备份为  ranking".$time);
            }
        }
        mysql_close($con);
    }





}