<?php
namespace Home\Controller;

use Think\Controller;

class ShowController extends BaseController
{
    public function index()
    {
        $count = M('Show')->count();
        $id = I('get.category');
        if (empty($id)) {
            $M = M('Show')->alias('A')
                ->field('A.id as id,A.img,A.preview,B.name')
                ->join('left join db_ShowCate B on B.id=A.category');
            $show = $M->order('A.orderid desc')->select();
        } else {
            $cate = D('Showcate')->where(array('category' => $id))->order('orderid desc')->select();
            $show = array();
            foreach ($cate as $key => $value) {
                $M = M('Show')->where(array('category' => $value['id']))->field('id,img,preview')->find();
                $M['name'] = $value['name'];
                $show[] = $M;
            }
        }
        $showcate = D('Showcate')->where(array('category' => 0))->order('orderid desc')->select();
        $this->assign('showcate', $showcate);
        $this->assign('data', $show);
        $this->display();
    }

    public function content()
    {
        $id = I('get.id');
        if (empty($id)) {
            $this->error('操作失败！');
        } else {
            $count = M('Show')->count();
            M('Show')->where(array('id' => $id))->setInc('click', 1);
            $M = M('Show')->alias('A')
                ->field('A.id as id,A.content,A.times,A.click,B.name')
                ->join('left join db_ShowCate B on B.id=A.category');
            $data = $M->where(array('A.id' => $id))->find();
        }
        $this->assign('data', $data);
        $this->display();
    }
}