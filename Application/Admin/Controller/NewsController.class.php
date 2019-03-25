<?php
namespace Admin\Controller;

use Think\Controller;

class NewsController extends BaseController
{
    public function Index()
    {
        $count = D('News')->count();
        $D = D('News')->alias('A')
            ->field('A.id as id,A.title,A.img,A.times,A.orderid,B.name')
            ->join('left join db_NewsCate B on B.id=A.category');
        $cate = getTree(D('Newscate')->select());
        $key = I('get.key');
        $category = I('get.category');
        if (strtotime($key)) {
            $where['times'] = array('like', '%' . $key . '%');
        } else {
            $where['title'] = array('like', '%' . $key . '%');
            $where['_logic'] = 'OR';
        }
        if ($category) {
            $name = D('News')->where(array('category' => $category))->find();
            $ccate = $name['name'];
        }
        $map['_complex'] = $where;
        $map['name'] = array('like', '%' . $ccate . '%');
        $P = Page($D, $map, 'A.orderid desc', $count, 15);
        $this->assign('data', $P);
        $this->assign('cate', $cate);
        $this->assign('category', $category);
        $this->display();
    }

    public function Add()
    {
        if (IS_POST) {
            $D = D('News');
            if ($module = $D->create()) {
                $module['times'] = date("Y-m-d H:i:s");
                $save = $D->add($module);
                $this->success('添加成功！', U('Index'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $D = D('Newscate')->select();
            $this->assign('cate', $D);
            $this->display();
        }
    }

    public function Edit()
    {
        if (IS_POST) {
            $D = D('News');
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
            $D = D('News');
            $id = I('get.id');
            if (empty($id)) {
                $this->error('操作失败！');
            }
            $data = $D->where(array('id' => $id))->find();
            $cate = D('Newscate')->select();
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
            $D = D('News');
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

    public function Category()
    {
        $D = D('Newscate')->order('orderid desc')->select();
        $this->assign('cate', $D);
        $this->display();
    }

    public function CateAdd()
    {
        if (IS_POST) {
            $data['name'] = $_POST['name'];
            $data['ename'] = $_POST['ename'];
            $data['orderid'] = $_POST['orderid'];
            $D = D('Newscate')->where(array('name' => $data['name']))->find();
            if ($D['name'] == $data['name'] || $D['ename'] == $data['ename']) {
                $this->error('分类已存在！', '', 1);
            } else if (empty($data['name']) || empty($data['ename'])) {
                $this->error('请输入分类名称！', '', 1);
            } else {
                M('Newscate')->add($data);
                $this->success('添加成功！', U('News/Category'), 1);
            }
        } else if (IS_GET) {
            $this->display();
        }
    }

    public function CateAddList()
    {
        if (IS_POST) {
            $catechild = I('get.category');
            $D = D('Newscate')->where(array('id' => $catechild))->find();
            $id = $D['id'];
            $level = $D['level'];
            $map['name'] = $_POST['name'];
            $map['ename'] = $_POST['ename'];
            $data['orderid'] = $_POST['orderid'];
            if ($D['name'] == $map['name'] || $D['ename'] == $map['ename']) {
                $this->error('子分类已存在！', '', 1);
            } else if (empty($map['name']) || empty($map['ename'])) {
                $this->error('请输入子分类名称！', '', 1);
            } else {
                $level = $level + 1;
                if ($level > 2) {
                    $blank = str_repeat('&nbsp;', 6 * ($level - 1));
                } else {
                    $blank = str_repeat('&nbsp;', $level * 3);
                }
                $str = $blank . "|——";
                $data['name'] = $map['name'];
                $data['ename'] = $map['ename'];
                $data['str'] = $str;
                $data['category'] = $catechild;
                $data['level'] = $level;
                M('Newscate')->add($data);
                $this->success('添加成功！', U('News/Category'), 1);
            }
        } else if (IS_GET) {
            $this->display();
        }
    }

    public function CateEdit()
    {
        if (IS_POST) {
            $id = I('get.id');
            $data['name'] = $_POST['name'];
            $data['ename'] = $_POST['ename'];
            $data['orderid'] = $_POST['orderid'];
            $D = D('Newscate')->where(array('name' => $data['name']))->find();
            if (empty($data['name']) || empty($data['ename'])) {
                $this->error('请输入分类名称！', '', 1);
            } else {
                M('Newscate')->where(array('id' => $id))->save($data);
                $this->success('修改成功！', U('News/Category'), 1);
            }
        } else if (IS_GET) {
            $M = M('Newscate');
            $id = I('get.id');
            if (empty($id)) {
                $this->error('参数错误！', '', 1);
            }
            $data = $M->where(array('id' => $id))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function CateDelete()
    {
        if (IS_AJAX) {
            $M = M('Newscate');
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