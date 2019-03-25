<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends BaseController
{
    public function Index()
    {
        $info['php'] = PHP_VERSION;
        $info['os'] = PHP_OS;
        $info['osBit'] = $_SERVER['SERVER_SOFTWARE'];
        $info['dataType'] = strtoupper(C('DB_TYPE'));
        $sss = C('DB_NAME');
        $dataFile = $_SERVER['DOCUMENT_ROOT'] . '/DB/KYJD.db3';
        $dataSize = filesize($dataFile);
        if ($dataSize) {
            $info['dataSize'] = $dataSize / 1024;
        } else {
            $info['dataSize'] = 0;
        }
        $this->assign('info', $info);
        $this->display();
    }

    public function Copy()
    {
        header('Content-Type: text/html; charset=utf-8');
        if (IS_POST) {
            $D = D('Copyright');
            if ($module = $D->create()) {
                $save = $D->where(array('id' => 1))->save($module);
                $this->success('修改成功！', U('Copy'), 1);
            } else {
                $error = $D->getError();
                $this->error($error);
            }
        } else if (IS_GET) {
            $D = D('Copyright');
            $data = $D->where(array('id' => 1))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function EditPwd()
    {
        $admin = session('admin');
        if (IS_POST) {
            $oldPass = md5(I('post.oldPass'));
            $newPass = md5(I('post.newPass'));
            $repeatPass = md5(I('post.repeatPass'));
            if ($oldPass !== $admin['password']) {
                $this->error('旧密码输入错误，请重新输入！', '', 1);
            }
            if ($newPass === $oldPass) {
                $this->error('新旧密码一致,您未做任何修改！', '', 1);
            } else if ($newPass !== $repeatPass) {
                $this->error('密码确认不一致,请重新输入！', '', 1);
            } else {
                $result = D('Admin')->where(array('loginname' => $admin['loginname']))->setField('password', $newPass);
                if ($result) {
                    session(null);
                    $this->success('密码修改成功！', U('Login/Index'), 1);
                } else {
                    $this->error("密码修改失败！", '', 1);
                }
            }
        } else if (IS_GET) {
            $this->display();
        }
    }

    public function Layout()
    {
        if (IS_AJAX) {
            session(null);
            $this->success('操作成功！');
            $this->redirect('Login/Index');
        }
    }

    public function ClearCache()
    {
        if (IS_AJAX) {
            DelFileByDir(APP_PATH . 'Runtime/Cache');
            $this->success('操作成功！');
        } else {
            $this->error('操作失败！');
        }
    }

    public function ClearLogs()
    {
        if (IS_AJAX) {
            DelFileByDir('./Logs');
            $this->success('操作成功！');
        } else {
            $this->error('操作失败！');
        }
    }

    public function Thumb()
    {
        if (IS_AJAX) {
            $width = I('post.width');
            $height = I('post.height');
            $url = I('post.url');
            //图片绝对路径
            $path = $_SERVER['DOCUMENT_ROOT'] . $url;
            //获取图片宽高
            $list = getimagesize($path);
            //判断图片类型
            if ($list[2] == 1) {
                $src = imagecreatefromgif($path);
            } else if ($list[2] == 2) {
                $src = imagecreatefromjpeg($path);
            } else if ($list[2] == 3) {
                $src = imagecreatefrompng($path);
            }

            //原图宽高
            $img_width = $list[0];
            $img_height = $list[1];

            /******************************** 等比缩放 ********************************/

            //计算图片比例
            if ($img_width >= $img_height) {
                $new_width = intval($height * ($img_width / $img_height));
                $new_height = intval($height);
            } else {
                $new_width = intval($width);
                $new_height = intval($width * ($img_height / $img_width));
            }

            if ($new_width < $width) {
                $new_width = $width;
            }

            if ($new_height < $height) {
                $new_height = $height;
            }

            //等比压缩
            $image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($image, $src, 0, 0, 0, 0, $new_width, $new_height, $img_width, $img_height);

            //存储根路径
            $scale_path = $_SERVER['DOCUMENT_ROOT'] . '/Uploads/';
            $scale_dir = 'scale';
            //创建文件夹
            if ($scale_dir !== '') {
                $scale_path .= $scale_dir . '/';
                if (!file_exists($scale_path)) {
                    mkdir($scale_path);
                }
            }

            $scale_time = date("Ymd");
            $scale_path .= $scale_time . '/';
            if (!file_exists($scale_path)) {
                mkdir($scale_path);
            }

            //生成图片并保存图片文件
            if ($list[2] == 1) {
                $scale_path .= date("YmdHis") . '_' . rand(10000, 99999) . '.gif';
                $result = imagegif($image, $scale_path);
                $scale_src = imagecreatefromgif($scale_path);
            } else if ($list[2] == 2) {
                $scale_path .= date("YmdHis") . '_' . rand(10000, 99999) . '.jpg';
                $result = imagejpeg($image, $scale_path);
                $scale_src = imagecreatefromjpeg($scale_path);
            } else if ($list[2] == 3) {
                $scale_path .= date("YmdHis") . '_' . rand(10000, 99999) . '.png';
                $result = imagepng($image, $scale_path);
                $scale_src = imagecreatefrompng($scale_path);
            }

            /******************************** 居中裁切 ********************************/

            //判断裁切宽高
            if ($new_width > $width) {
                $x = intval(($new_width - $width) / 2);
                $y = 0;
            } else if ($new_height > $height) {
                $x = 0;
                $y = intval(($new_height - $height) / 2);
            }

            //居中裁切
            $images = imagecreatetruecolor($width, $height);
            imagecopy($images, $scale_src, 0, 0, $x, $y, $new_width, $new_height);

            //创建文件夹
            $thumb_path = $_SERVER['DOCUMENT_ROOT'] . '/';
            $thumb_url = '/';
            $thumb_save_path = $thumb_path . 'Uploads/';
            $thumb_dir = 'thumb';
            $thumb_url = $thumb_url . 'Uploads/' . $thumb_dir . '/';
            if ($thumb_dir !== '') {
                $thumb_path .= $thumb_dir . '/';
                $thumb_save_path .= $thumb_dir . '/';
                if (!file_exists($thumb_save_path)) {
                    mkdir($thumb_save_path);
                }
            }

            $thumb_time = date("Ymd");
            $thumb_save_path .= $thumb_time . '/';
            $thumb_url .= $thumb_time . '/';
            if (!file_exists($thumb_save_path)) {
                mkdir($thumb_save_path);
            }

            //裁切图片保存至文件夹并返回相对路径
            if ($list[2] == 1) {
                $new_file_names = date("YmdHis") . '_' . rand(10000, 99999) . '_' . $width . '_' . $height . '.gif';
                $thumb_save_path .= $new_file_names;
                $thumb_url .= $new_file_names;
                $results = imagegif($images, $thumb_save_path);
            } else if ($list[2] == 2) {
                $new_file_names = date("YmdHis") . '_' . rand(10000, 99999) . '_' . $width . '_' . $height . '.jpg';
                $thumb_save_path .= $new_file_names;
                $thumb_url .= $new_file_names;
                $results = imagejpeg($images, $thumb_save_path);
            } else if ($list[2] == 3) {
                $new_file_names = date("YmdHis") . '_' . rand(10000, 99999) . '_' . $width . '_' . $height . '.png';
                $thumb_save_path .= $new_file_names;
                $thumb_url .= $new_file_names;
                $results = imagepng($images, $thumb_save_path);
            }

            //返回最终相对路径
            if ($thumb_url) {
                $this->ajaxReturn($thumb_url);
            } else {
                $this->error('错误！');
            }
        }
    }
}
?>