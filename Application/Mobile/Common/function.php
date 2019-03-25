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
    $page->setConfig('theme',' %UP_PAGE% %DOWN_PAGE% ');
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
?>