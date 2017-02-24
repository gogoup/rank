<?php
namespace Home\Model;
use Think\Model;

class RankingModel extends Model
{
  public function allRank7($k_id)
  {
      $now=date("Y-m-d");
      $old=date("Y-m-d",strtotime('-6 day'));
      $sql="SELECT * FROM (SELECT * FROM rank_ranking WHERE k_id=$k_id AND `time` BETWEEN '$old' AND '$now' ORDER BY rank ASC) r  GROUP BY `time`,k_id ORDER BY `time` DESC";
      $list=$this->query($sql);
      $rank=array();
      foreach($list as $value)
      {
          $rank[$value['time']]=$value['rank'];
          if(!empty($value['keyword']))
          $rank['keyword']=$value['keyword'];
      }
      return $rank;

  }
}