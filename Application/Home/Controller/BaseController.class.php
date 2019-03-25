<?php
namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $C = D('Copyright')->where(array('id' => 1))->find();
        $M = D('Module')->select();
        $Code = D('Code')->select();
        $this->assign('C', $C);
        $this->assign('nav', $M);
        $this->assign('code', $Code);
    }

    public function _initialize()
    {
        $isphonestr = array("iphone", "android");
        $httpmoblie = $_SERVER['HTTP_USER_AGENT'];
        foreach ($isphonestr as $ii) {
            if (strripos($httpmoblie, $ii)) {
                $this->redirect('/Mobile');
            }
        }
    }
}