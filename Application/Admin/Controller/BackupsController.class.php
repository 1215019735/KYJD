<?php
namespace Admin\Controller;

use Think\Controller;

class BackupsController extends BaseController
{
    public function Index()
    {
        //打开新文件根目录
        $dir = opendir($_SERVER['DOCUMENT_ROOT'] . '/DB/Backups/');
        //找到新文件并把新文件名保存至$fileList数组
        while ($fileName = readdir($dir)) {
            if ($fileName != '.' && $fileName != '..') {
                $fileList[]['name'] = $fileName;
            }
        }
        //获取文件名字段中所有的数字
        foreach ($fileList as $k => $v) {
            preg_match('/\d+/', $v['name'], $arr);
            $intList[$k] = $arr;
        }
        //把文件名字段中的数字转换为日期格式
        foreach ($intList as $key => $value) {
            $kk = substr($value[0], 0, 4);
            $vv = substr($value[0], 4, 2);
            $ii = substr($value[0], 6, 2);
            $xx = substr($value[0], 8, 2);
            $yy = substr($value[0], 10, 2);
            $zz = substr($value[0], 12, 2);
            $str = $kk . '-' . $vv . '-' . $ii . '&nbsp;' . $xx . ':' . $yy . ':' . $zz;
            $saveList[$key]['name'] = $fileList[$key]['name'];
            $saveList[$key]['times'] = $str;
        }
        $this->assign('data', $saveList);
        $this->display();
    }

    public function Backups()
    {
        if (IS_AJAX) {
            //原文件名
            $fileName = 'KYJD.db3';
            //新文件名
            $newName = date("YmdHis") . '.db3';
            //原文件路径
            $file_path = $_SERVER['DOCUMENT_ROOT'] . '/DB/' . $fileName;
            //新文件保存根目录
            $save_path = $_SERVER['DOCUMENT_ROOT'] . '/DB/';
            $save_dir = 'Backups';
            //生成文件夹
            if ($save_dir !== '') {
                $save_path .= $save_dir . '/';
                if (!file_exists($save_path)) {
                    mkdir($save_path);
                }
            }
            //复制文件
            $save = copy($file_path, $save_path . $newName);
            if ($save) {
                $this->success('备份成功！');
            } else {
                $this->error('备份失败！');
            }
        }
    }

    public function Restore()
    {
        if (IS_AJAX) {
            //获取新文件名
            $name = I('post.id');
            //新文件根目录
            $file_path = $_SERVER['DOCUMENT_ROOT'] . '/DB/Backups/';
            //原文件根目录
            $replace_path = $_SERVER['DOCUMENT_ROOT'] . '/DB/';
            //将新文件移动到原文件根目录
            $save = copy($file_path . $name, $replace_path . $name);
            if ($save) {
                //删除原文件
                $unlink = unlink($replace_path . 'KYJD.db3');
                //将新文件名重命名为原文件名
                $newName = rename($replace_path . $name, $replace_path . 'KYJD.db3');
                $this->success('还原成功！');
            } else {
                $this->error('还原失败！');
            }
        }
    }

    public function Delete()
    {
        if (IS_AJAX) {
            //获取提交过来的文件名数组
            $name = split('&amp;', I('post.id'));
            //逐个删除
            foreach ($name as $key => $value) {
                $unlink = urldecode($_SERVER['DOCUMENT_ROOT'] . '/DB/Backups/' . $value);
                $data = unlink($unlink);
            }
            if ($data) {
                $this->success('删除成功！');
            } else {
                $this->error('删除失败！');
            }
        }
    }
}