<?php
/**
 *
 * User: Zachary Liang
 * Date: 16-11-22
 * Time: 下午4:34
 */

namespace app\manage\controller;
use app\manage\common\controller\BaseController;

/**
 * Class Index
 * @package app\manage\controller
 */
class Index extends BaseController
{
    public function Index(){
        $this->assign('data', $this->data);
        return $this->fetch('Index' . DS . 'Index');
    }

    public function Home(){
        $this->assign('data', $this->data);
        return $this->fetch('Index' . DS .'Home');
    }

    public function Menu(){
        $this->assign('data', $this->data);
        return $this->fetch('Index' . DS .'Menu');
    }
}