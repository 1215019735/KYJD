<?php
namespace Mobile\Controller;

use Think\Controller;

class SelectController extends BaseController
{
    public function index()
    {
        $count = M('Jx')->count();
        $M = M('Jx');
        $data = Page($M, '', 'orderid desc', $count, 1);
        $this->assign('data', $data);
        $this->display();
    }

    public function content()
    {
        $id = I('get.id');
        $data = D('Jx')->where(array('id' => $id))->find();
        $this->assign('data', $data);
        $this->display();
    }
}