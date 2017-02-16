<?php
namespace Home\Controller;
use Think\Controller;

class RankController extends CommonController
{
    public function link()
    {
        layout(false);
        $this->display();
    }
    public function keyword()
    {
        layout(false);
        $this->display();
    }


}