<?php
namespace Admin\Controller;

use Think\Controller;

class PayController extends BaseController
{
    public function Index()
    {
        $D = D('Pay')->select();
        $this->assign('data', $D);
        $this->display();
    }

    public function Delete()
    {
        if (IS_AJAX) {
            $D = D('Pay');
            $id = split('&amp;', I('post.id'));
            foreach ($id as &$ii) {
                $ids = urldecode($ii);
                $data = $D->where(array('id' => $ids))->delete();
            }
            $this->success('删除成功！');
        } else {
            $this->error('删除失败！');
        }
    }
}