<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Model\LoginModel;

class LoginController extends Controller
{
    public function Index()
    {
        // session('username', null);
        // if (IS_AJAX) {
        //     $Verify = new \Think\Verify();
        //     if (!$Verify->check($_POST['verify'])) {
        //         $Verify = I('post.verify');
        //         if (empty($Verify)) {
        //             $this->error('验证码不能为空！', '', 1);
        //         } else if (!check_verify($Verify)) {
        //             session('ThinkPHP.CN', null);
        //             $this->error("验证码错误！", '', 1);
        //         }
        //     } else {
        //         $login = D('Login');
        //         if (!$data = $login->create()) {
        //             header("Content-type: text/html; charset=utf-8");
        //             exit($login->getError());
        //         }
        //         $where = array();
        //         $where['username'] = $data['username'];
        //         $where['password'] = $data['password'];
        //         $result = $login->where($where)->select();
        //         if ($result) {
        //             session('username', $result[0]['username']);
        //             session('password', $result[0]['password']);
        //             $this->ajaxReturn($result);
        //         } else {
        //             session('ThinkPHP.CN', null);
        //             $this->error('用户名或密码错误!', '', 1);
        //         }
        //     }
        // } else if (IS_GET) {
        //     $this->display();
        // }
        if (IS_AJAX) {
            //获取参数
            $verify = I('post.verify');
            //判断验证码
            $verifys = new \Think\Verify();
            if (!$verifys->check($verify)) {
                if (empty($verify)) {
                    $this->error('验证码不能为空');
                } else if (!check_verify($verify)) {
                    session('ThinkPHP.CN', null);
                    $this->error('验证码错误!');
                }
            } else {
                $loginOnResult = loginOn();
                if ($loginOnResult[0] === 1) {
                    $this->success($loginOnResult[1]);
                } else {
                    $this->error($loginOnResult[1]);
                }
            }
        } else if (IS_GET) {
            $this->display();
        }
    }

    public function Verify()
    {
        $Verify = new \Think\Verify();
        $Verify->codeSet = '0123456789';
        $Verify->length = 4;
        $Verify->fontSize = 36;
        $Verify->imageW = 315;
        $Verify->imageH = 80;
        $Verify->entry();
    }
}