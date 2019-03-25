<?php
namespace Mobile\Controller;

use Think\Controller;

class ContactController extends BaseController
{
    public function index()
    {
        $N = D('Nav')->select();
        $map = D('Map')->select();
        foreach($map as $key => $value){
            $map[$key]['coorcontent'] = htmlspecialchars_decode($value['coorcontent']);
            $map[$key]['ecoorcontent'] = htmlspecialchars_decode($value['ecoorcontent']);
        }
        $json = json_encode($map);
        $this->assign('nav', $N);
        $this->assign('json', $json);
        $this->display();
    }
}