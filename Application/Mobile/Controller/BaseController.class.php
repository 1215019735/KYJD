<?php
namespace Mobile\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $C = D('Copyright')->where(array('id' => 1))->find();
        $T = D('pricecate')->select();
        $code = D('Code')->select();
        $this->assign('pricecate', $T);
        $this->assign('C', $C);
        $this->assign('code', $code);
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
}