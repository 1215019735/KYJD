<?php
namespace Admin\Controller;

use Think\Controller;

class JxController extends BaseController
{
    public function Index()
    {
        $D = D('Jx')->select();
        $this->assign('data', $D);
        $this->display();
    }

    public function Add()
    {
        if (IS_POST) {
            $D = D('Jx');
            if ($module = $D->create()) {
                $module['times'] = date("Y-m-d H:i:s");
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

    public function Edit()
    {
        if (IS_POST) {
            $D = D('Jx');
            $id = I('get.id');
            if ($module = $D->create()) {
                $module['times'] = date("Y-m-d H:i:s");
                $save = $D->where(array('id' => $id))->save($module);
                $this->success('修改成功！', U('Index'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $D = D('Jx');
            $id = I('get.id');
            if (empty($id)) {
                $this->error('参数错误！');
            }
            $data = $D->where(array('id' => $id))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function Delete()
    {
        if (IS_AJAX) {
            $D = D('Jx');
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