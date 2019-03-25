<?php

/**
 * Undocumented function
 *
 * @param [type] $model
 * @param string $where
 * @param integer $pageCount
 * @return void
 */
function Page($M, $where = '', $order, $count, $pageCount)
{
    $page = new \Think\Page($count, $pageCount);
    $page->setConfig('header', '条留言');
    $page->setConfig('first', '首页');
    $page->setConfig('prev', '上页');
    $page->setConfig('next', '下页');
    $page->setConfig('last', '尾页');
    $page->setConfig('listRows', $pageCount);
    $data['page'] = $page->show();
    $data['list'] = $M->where($where)->order($order)->limit($page->firstRow . ',' . $page->listRows)->select();
    return $data;
}

//无限极分类
function getTree($M, $parentid = 0, $level = 1)
{
    static $tree = array();
    foreach ($M as $key => $value) {
        if ($value['category'] == $parentid) {
            $value['level'] = $level;
            $tree[] = $value;
            getTree($M, $value['id'], $level + 1);
        }
    }
    return $tree;
}

//清除缓存
function DelFileByDir($dir)
{
    $dh = opendir($dir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $dir . "/" . $file;
            if (is_dir($fullpath)) {
                DelFileByDir($fullpath);
            } else {
                unlink($fullpath);
            }
        }
    }
    closedir($dh);
}

//验证码生成
function check_verify($code, $id = "")
{
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

function get_real_ip()
{
    $ip = false;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode(', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) {
            array_unshift($ips, $ip);
            $ip = false;
        }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi('^(10│172.16│192.168).', $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

function loginOn()
{
    $loginOnResult = array(0, '未处理');
    $D = D('Admin');
    if (!$module = $D->create()) {
        $loginOnResult[1] = $D->getError();
        return $loginOnResult;
    } else {
        $result = $D->where(array('loginname' => $module['loginname'], 'password' => md5($module['password'])))->find();
        if ($result) {
            if ($result['isused'] === 0) {
                $loginOnResult[1] = '账号已被禁用！';
            } else {
                //生成登录次数
                if (empty($result['loginnum'])) {
                    $update['loginnum'] = 1;
                } else {
                    $update['loginnum'] = $result['loginnum'] + 1;
                }
                //最后登录时间
                $update['lasttime'] = date('Y-m-d H:i:s');
                //最后登录IP
                $update['lastip'] = get_real_ip();
                //最后登录地区
                $ip = new \Org\Net\IpLocation('UTFWry.dat'); // 实例化类
                $location = $ip->getlocation($update['lastip']); // 获取某个IP地址所在的位置
                $update['lastarea'] = $location['country'];
                //生成token
                $_token = $module['loginname'] . ',' . (string)strtotime($update['lasttime']);
                $update['tokencode'] = base64_encode($_token);
                $update['tokendeadline'] = strtotime($update['lasttime']) + 60 * 60 * 2;
                //保存修改
                $D->where(array('id' => $result['id']))->save($update);
                $save = $D->getLastSql();
                session('admin', $result);
                cookie('admin', $update['tokenCode'], 'expire=3600');
                $loginOnResult[0] = 1;
            }
        } else {
            $loginOnResult[1] = '用户名或密码错误';
        }
        return $loginOnResult;
    }
}

function LoginVal()
{
    $login = false;
    $admin = session('admin');
    if (!empty($admin)) {
        if (!empty($admin['id'])) {
            session('admin', $admin);
            $login = true;
        }
    }
    // 不为空找cookie
    if (!$login) {
        $cookie = cookie('admin');
        if (!empty($cookie)) {
            $D = D('admin');
            $model = $D->where(array('tokencode' => $cookie, 'tokendeadline' => array('<', date())))->find();
            if ($model) {
                $admin = $model;
                session('admin', $model);
                cookie('admin', $cookie, 'expire=3600');
            }
        }
    }
    return $admin;
}
?>