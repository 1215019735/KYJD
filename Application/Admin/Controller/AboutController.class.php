<?php
namespace Admin\Controller;

use Think\Controller;

class AboutController extends BaseController
{
    public function Index()
    {
        $D = D('About')->alias('A')
            ->field('A.id as id,A.icon,B.name')
            ->join('left join db_AboutCate B on B.id=A.category')
            ->select();
        $this->assign('data', $D);
        $this->display();
    }

    public function Add()
    {
        if (IS_POST) {
            $D = D('About');
            if ($module = $D->create()) {
                $save = $D->add($module);
                $this->success('添加成功！', U('Index'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $D = D('Aboutcate')->select();
            $this->assign('cate', $D);
            $this->display();
        }
    }

    public function Edit()
    {
        if (IS_POST) {
            $D = D('About');
            $id = I('get.id');
            if ($module = $D->create()) {
                $save = $D->where(array('id' => $id))->save($module);
                $this->success('添加成功！', U('Index'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $D = D('About');
            $id = I('get.id');
            if (empty($id)) {
                $this->error('参数错误！');
            }
            $cate = D('Aboutcate')->select();
            $data = $D->where(array('id' => $id))->find();
            $category = $data['category'];
            $this->assign('category', $category);
            $this->assign('cate', $cate);
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function Delete()
    {
        if (IS_AJAX) {
            $D = D('About');
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