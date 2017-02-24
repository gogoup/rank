<?php
namespace Home\Controller;
use Think\Controller;

class DataController extends Controller
{
    public function outrank1($k_id,$l_no)
    {
        $keywords=M('Keyword');
        $links=M('Links');

        $kinfo=$keywords->where('k_id='.$k_id)->find();

        $sql="select * from `rank_links` where `p_id`=".$kinfo['p_id']." limit ".$l_no.",1";

        $linfo=$links->query($sql);
        if(!empty($linfo)) {

            $Project=M('Project');
            $pro=$Project->where('p_id='.$kinfo['p_id'])->find();

            $data=array(
                'k_id'=>$kinfo['k_id'],
                'keyword'=>$kinfo['keyword'],
                'p_id'=>$kinfo['p_id'],
                'p_name'=>$pro['p_name'],
                'l_id'=> $linfo['0']['l_id'],
                'l_link'=>$linfo['0']['l_link']
            );
            return $data;
        }else{
            return NUll;
        }
    }

    public function outrank()
    {
        $rankno=M('Rankno');
        $no=$rankno->where('n_id=1')->find();
        $data=$this->outrank1($no['k_no'],$no['l_no']);
        if(!empty($data))
        {
            $ran['l_no']=$no['l_no']+1;
            $rankno->where('n_id=1')->save($ran);
            header("Content-type: text/html; charset=utf-8");
            print_r($data);
        }else{
            $keywords=M('Keyword');
            $kcount=$keywords->query("select `k_id` from rank_keyword ORDER BY `k_id` DESC limit 1");
            $num=$no['k_no']+1;
            if($num>$kcount[0]['k_id'])
            {
                $data['k_no']=1;
            }else{
                $data['k_no']=$num;
            }
            $data['l_no']=0;
            $rankno->where('n_id=1')->save($data);
            self::outrank();
        }
    }
    public function getrank()
    {
        //k_id=关键词id&keyword=关键词&p_id=项目id&p_name=项目&l_id=域名id&link=域名&rank=排名&browser=搜索引擎
        $data=$_GET;
        $data['time']=date('Y-m-d');
        $rank=M("Ranking");
        $rank->add($data);
    }


}