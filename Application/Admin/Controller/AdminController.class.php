<?php
namespace Admin\Controller;

use Think\Controller;

class AdminController extends BaseController
{
    public function Index()
    {
        $admin = session('admin');
        if ($admin['groupname'] === '101') {
            $M = M('Admin');
            $count = $M->count();
            $P = Page($M, '', '', $count, 15);
        } else {
            $M = M('Admin');
            $count = $M->count();
            $P = Page($M, array('groupname' => $admin['groupname']), '', $count, 15);
        }
        $this->assign('data', $P);
        $this->display();
    }

    public function Add()
    {
        if (IS_POST) {
            $D = D('Admin');
            if ($module = $D->create()) {
                $module['id'] = md5(date("Y-m-d H:i:s") . rand(0, 99999999));
                $module['password'] = md5(I('post.password'));
                $save = $D->add($module);
                $this->success('添加成功！', U('Index'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $this->display();
        }
    }

    public function Delete()
    {
        if (IS_AJAX) {
            $M = M('Admin');
            $id = split('&amp;', I('post.id'));
            foreach ($id as &$ii) {
                $ids = urldecode($ii);
                $data = $M->where(array('id' => $ids))->delete();
            }
            $this->success('删除成功！');
        } else {
            $this->error('删除失败！');
        }
    }
}