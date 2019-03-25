<?php
namespace Emobile\Controller;

use Think\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        $A = D('About')->select();
        $SC = D('Showcate')->where(array('category' => 0))->order('orderid desc')->select();
        $S = M('Server')->alias('A')
            ->field('A.id as id,A.img,B.ename')
            ->join('left join db_ServerCate B on B.id=A.category')
            ->order('A.orderid desc')->select();;
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
}