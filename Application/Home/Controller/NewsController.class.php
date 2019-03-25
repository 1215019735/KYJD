<?php
namespace Home\Controller;

use Think\Controller;

class NewsController extends BaseController
{
    public function index()
    {
        $M = M('News');
        $category = I('get.category');
        if ($category) {
            $count = M('News')->where(array('category' => $category))->count();
            $news = Page($M, array('category' => $category), 'orderid desc', $count, 6);
        } else {
            $count = M('News')->count();
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
        }
        M('News')->where(array('id' => $id))->setInc('click', 1);
        $data = D('News')->where(array('id' => $id))->find();
        $this->assign('data', $data);
        $this->display();
    }
}