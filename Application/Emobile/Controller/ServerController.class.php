<?php
namespace Emobile\Controller;

use Think\Controller;

class ServerController extends BaseController
{
    public function index()
    {
        $count = M('Server')->count();
        $id = I('get.id');
        if (empty($id)) {
            $M = M('Server');
            $data = Page($M, '', 'orderid desc', $count, 1);
        } else {
            $M = M('Server')->alias('A')
                ->field('A.id as id,A.category,A.img,B.ename')
                ->join('left join db_ServerCate B on B.id=A.category');
            $data = Page($M, array('A.category' => $id), 'A.orderid desc', $count, 1);
        }
        $D = D('Servercate')->order('orderid desc')->select();
        $this->assign('data', $data);
        $this->assign('nav', $D);
        $this->display();
    }

    public function content()
    {
        $id = I('get.id');
        if (empty($id)) {
            $this->error('ERROR!');
        } else {
            M('Server')->where(array('id' => $id))->setInc('click', 1);
            $data = M('Server')->alias('A')
                ->field('A.id as id,A.times,A.click,A.econtent,B.ename')
                ->join('left join db_ServerCate B on B.id=A.category')
                ->where(array('A.id' => $id))->find();
        }
        $this->assign('data', $data);
        $this->display();
    }
}