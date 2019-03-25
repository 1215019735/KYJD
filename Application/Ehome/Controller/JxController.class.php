<?php
namespace Ehome\Controller;

use Think\Controller;

class JxController extends BaseController
{
    public function content()
    {
        $id = I('get.id');
        if (empty($id)) {
            $this->error('ERROR！');
        }
        $data = D('Jx')->where(array('id' => $id))->find();
        $this->assign('data', $data);
        $this->display();
    }
}