<?php
/**
 * logic基础方法接口
 * User: Zachary Liang
 * Date: 16-11-24
 * Time: 下午3:26
 */

namespace app\manage\common\logic;


interface ILogic
{
    public function get_list();

    public function get_model($uuid);

    public function add($param);

    public function edit($param, $uuid);

    public function del($param);

    public function batch_del($param);
}