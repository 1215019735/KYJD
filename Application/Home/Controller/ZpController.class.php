<?php
namespace Home\Controller;

use Think\Controller;

class ZpController extends BaseController
{
    public function index()
    {
        $data = D('Zp')->select();
        $this->assign('data',$data);
        $this->display();
    }
}