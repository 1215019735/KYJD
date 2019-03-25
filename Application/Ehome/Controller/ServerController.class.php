<?php
namespace Ehome\Controller;

use Think\Controller;

class ServerController extends BaseController
{
    public function index()
    {
        $count = M('Server')->count();
        $M = M('Server')->alias('A')
            ->field('A.id as id,A.category,A.img,A.epreview,B.ename')
            ->join('left join db_ServerCate B on B.id=A.category');
        $data = Page($M, '', 'A.orderid desc', $count, 5);
        $this->assign('data', $data);
        $this->display();
    }

    public function content()
    {
        $id = I('get.id');
        if (empty($id)) {
            $this->error('操作失败！');
        } else {
            M('Server')->where(array('id' => $id))->setInc('click', 1);
            $count = M('Server')->count();
            $data = M('Server')->alias('A')
                ->field('A.id as id,A.category,A.img,A.econtent,A.times,A.click,B.ename')
                ->join('left join db_ServerCate B on B.id=A.category')
                ->where(array('A.id' => $id))->find();
        }
        $this->assign('data', $data);
        $this->display();
    }
}