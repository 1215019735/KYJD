<?php
namespace Ehome\Controller;

use Think\Controller;

class NewsController extends BaseController
{
    public function index()
    {
        $count = M('News')->count();
        $M = M('News');
        $category = I('get.category');
        if ($category) {
            $news = Page($M, array('category' => $category), 'orderid desc', $count, 6);
        } else {
            $news = Page($M, '', 'orderid desc', $count, 6);
        }
        $newscate = D('Newscate')->order('orderid desc')->select();
        $this->assign('newscate', $newscate);
        $this->assign('data', $news);
        $this->display();
    }

    public function content()
    {
        $id = I('get.id');
        if (empty($id)) {
            $this->error('操作失败！');
        } else {
            M('News')->where(array('id' => $id))->setInc('click', 1);
            $data = D('News')->where(array('id' => $id))->find();
        }
        $this->assign('data', $data);
        $this->display();
    }
}