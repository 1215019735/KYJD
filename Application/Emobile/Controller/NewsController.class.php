<?php
namespace Emobile\Controller;

use Think\Controller;

class NewsController extends BaseController
{
    public function index()
    {
        $count = M('News')->count();
        $M = M('News');
        $id = I('get.id');
        if (empty($id)) {
            $data = Page($M, '', 'orderid desc', $count, 8);
        } else {
            $data = Page($M, array('category' => $id), 'orderid desc', $count, 8);
        }
        $nav = D('Newscate')->order('orderid desc')->select();
        $this->assign('nav', $nav);
        $this->assign('data', $data);
        $this->display();
    }

    public function content()
    {
        $id = I('get.id');
        if (empty($id)) {
            $this->error('ERROR!');
        }
        M('News')->where(array('id' => $id))->setInc('click', 1);
        $data = D('News')->where(array('id' => $id))->find();
        $this->assign('data', $data);
        $this->display();
    }
}