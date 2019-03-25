<?php
namespace Mobile\Controller;

use Think\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        $A = D('About')->select();
        $SC = D('Showcate')->where(array('category' => 0))->order('orderid desc')->select();
        $S = M('Server')->alias('A')
            ->field('A.id as id,A.img,B.name')
            ->join('left join db_ServerCate B on B.id=A.category')
            ->order('A.orderid desc')->select();
        $N = D('News')->order('orderid desc')->select();
        $Z = D('Zp')->select();
        $J = D('Jx')->order('orderid desc')->select();
        $this->assign('about', $A);
        $this->assign('showcate', $SC);
        $this->assign('server', $S);
        $this->assign('news', $N);
        $this->assign('zp', $Z);
        $this->assign('jx', $J);
        $this->display();
    }

    public function Show()
    {
        if (IS_AJAX) {
            $id = I('post.id');
            $D = D('Showcate')->where(array('category' => $id))->order('orderid desc')->select();
            $tree = array();
            foreach ($D as $key => $value) {
                $show = D('Show')->where(array('category' => $value['id']))->find();
                $tree[] = $show;
            }
            if ($tree) {
                $this->ajaxReturn($tree);
            } else {
                $this->error('错误！');
            }
        }
    }

    public function Showin()
    {
        if (IS_AJAX) {
            $cate = I('post.cate');
            $D = D('Showin')->where(array('category' => $cate))->order('orderid desc')->select();
            if ($D) {
                $this->ajaxReturn($D);
            } else {
                $this->error('错误！');
            }
        }
    }
}

