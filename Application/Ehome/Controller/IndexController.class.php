<?php
namespace Ehome\Controller;

use Think\Controller;

class IndexController extends BaseController
{
    public function index()
    {
        $A = D('About')->select();
        $S = M('Server')->alias('A')
            ->field('A.id as id,A.img,B.ename')
            ->join('left join db_ServerCate B on B.id=A.category')
            ->order('A.orderid desc')->select();
        $J = D('Jx')->order('id desc')->select();
        $T = D('pricecate')->select();
        $SC = D('Showcate')->where(array('category' => 0))->order('orderid desc')->select();
        $NC = D('Newscate')->where(array('category' => 0))->order('orderid desc')->select();
        $Z = D('Zp')->select();
        $map = D('Map')->select();
        foreach($map as $key => $value){
            $map[$key]['coorcontent'] = htmlspecialchars_decode($value['coorcontent']);
            $map[$key]['ecoorcontent'] = htmlspecialchars_decode($value['ecoorcontent']);
        }
        $json = json_encode($map);
        $this->assign('about', $A);
        $this->assign('pricecate', $T);
        $this->assign('showcate', $SC);
        $this->assign('server', $S);
        $this->assign('jx', $J);
        $this->assign('newscate', $NC);
        $this->assign('zp', $Z);
        $this->assign('json', $json);
        $this->display();
    }

    public function Price()
    {
        if (IS_AJAX) {
            $cate = I('post.cate');
            $count = I('post.count');
            $data['category'] = $cate;
            $D = D('Price')->where($data)->field('price')->find();
            $counts = preg_replace('/[^0-9]/', '', $count);
            $price = $D['price'] * $counts;
            if ($price) {
                $this->ajaxReturn($price);
            } else {
                $this->error('错误！');
            }
        }
    }

    public function Pay()
    {
        if (IS_AJAX) {
            $D = D('Pay');
            if ($module = $D->create()) {
                $cate = D('pricecate')->where(array('id' => $module['roomtype']))->find();
                $module['roomtype'] = $cate['roomtype'];
                $module['times'] = date("Y-m-d H:i:s");
                $save = $D->add($module);
                if ($save) {
                    $this->success('提交成功！');
                } else {
                    $this->error('提交失败！');
                }
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        }
    }

    public function News()
    {
        if (IS_AJAX) {
            $id = I('post.id');
            $D = D('News')->where(array('category' => $id))->order('orderid desc')->select();
            if ($D) {
                $this->ajaxReturn($D);
            } else {
                $this->error('参数错误！');
            }
        }
    }
}