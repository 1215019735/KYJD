<?php
namespace Home\Controller;

use Think\Controller;

class JxController extends BaseController
{
    public function content()
    {
        $id = I('get.id');
        if (empty($id)) {
            $this->error('操作失败！');
        }
        $data = D('Jx')->where(array('id' => $id))->find();
        $this->assign('data', $data);
        $this->display();
    }
}