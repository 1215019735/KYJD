<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $login = false;
        if ($admin = LoginVal()) {
            $login = true;
            $admin = session('admin');
            $this->assign('admin', $admin);
        } else {
            echo ("<script>window.location.href='/Admin/Login/Index';</script>");
            exit;
        }
    }
}