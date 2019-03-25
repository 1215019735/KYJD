<?php
namespace Emobile\Controller;

use Think\Controller;

class ShowController extends BaseController
{
    public function index()
    {
        $id = I('get.id');
        if (empty($id)) {
            $M = M('Show')->alias('A')
                ->field('A.id as id,A.img,B.ename')
                ->join('left join db_ShowCate B on B.id=A.category');
            $data = $M->order('A.orderid desc')->select();
        } else {
            $D = D('Showcate')->where(array('category' => $id))->order('orderid desc')->select();
            $info = array();
            foreach ($D as $key => $value) {
                $M = M('Show')->where(array('category' => $value['id']))->field('id,img,epreview')->find();
                $M['ename'] = $value['ename'];
                $info[] = $M;
            }
            $data = $info;
        }
        $cate = D('Showcate')->where(array('category' => 0))->order('orderid desc')->select();
        $this->assign('showcate', $cate);
        $this->assign('data', $data);
        $this->display();
    }

    public function content()
    {
        $id = I('get.id');
        if(empty($id)){
            $this->error('ERROR！');
        }else{
            M('Show')->where(array('id' => $id))->setInc('click', 1);
            $M = M('Show')->alias('A')
                ->field('A.id as id,A.econtent,A.times,A.click,B.ename')
                ->join('left join db_ShowCate B on B.id=A.category');
            $data = $M->where(array('A.id' => $id))->find();
        }
        $this->assign('data', $data);
        $this->display();
    }
}