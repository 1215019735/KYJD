<?php
namespace Emobile\Controller;

use Think\Controller;

class AboutController extends BaseController
{
    public function index()
    {
        $category = I('get.category');
        $data = M('About')->alias('A')
            ->field('A.id as id,A.econtent,B.ename')
            ->join('left join db_AboutCate B on B.id=A.category')
            ->where(array('A.category' => $category))
            ->find();
        $this->assign('data', $data);
        $this->display();
    }
}