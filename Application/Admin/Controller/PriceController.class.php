<?php
namespace Admin\Controller;

use Think\Controller;

class PriceController extends BaseController
{
    public function Index()
    {
        $D = D('Price')->alias('A')
            ->field('A.id as id,A.price,B.roomtype')
            ->join('left join db_priceCate B on B.id=A.category')
            ->select();
        $this->assign('data', $D);
        $this->display();
    }

    public function Add()
    {
        if (IS_POST) {
            $D = D('Price');
            if ($module = $D->create()) {
                $save = $D->add($module);
                $this->success('添加成功！', U('Index'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $cate = D('pricecate')->select();
            $this->assign('cate', $cate);
            $this->display();
        }
    }

    public function Edit()
    {
        if (IS_POST) {
            $D = D('Price');
            $id = I('get.id');
            if ($module = $D->create()) {
                $save = $D->where(array('id' => $id))->save($module);
                $this->success('修改成功！', U('Index'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $D = D('Price');
            $id = I('get.id');
            if (empty($id)) {
                $this->error('操作失败！');
            }
            $data = $D->where(array('id' => $id))->find();
            $cate = D('pricecate')->select();
            $category = $data['category'];
            $this->assign('data', $data);
            $this->assign('cate', $cate);
            $this->assign('category', $category);
            $this->display();
        }
    }

    public function Delete()
    {
        if (IS_AJAX) {
            $D = D('Price');
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

    public function Room()
    {
        $D = D('pricecate')->select();
        $this->assign('data', $D);
        $this->display();
    }

    public function RoomAdd()
    {
        if (IS_POST) {
            $D = D('pricecate');
            if ($module = $D->create()) {
                $save = $D->add($module);
                $this->success('添加成功！', U('Room'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $this->display();
        }
    }

    public function RoomEdit()
    {
        if (IS_POST) {
            $D = D('pricecate');
            $id = I('get.id');
            if ($module = $D->create()) {
                $save = $D->where(array('id' => $id))->save($module);
                $this->success('修改成功！', U('Room'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $D = D('pricecate');
            $id = I('get.id');
            if (empty($id)) {
                $this->error('参数错误！');
            }
            $data = $D->where(array('id' => $id))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function RoomDelete()
    {
        if (IS_AJAX) {
            $D = D('pricecate');
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