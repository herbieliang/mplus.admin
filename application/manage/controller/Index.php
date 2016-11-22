<?php
/**
 *
 * User: Zachary Liang
 * Date: 16-11-22
 * Time: 下午4:34
 */

namespace app\manage\controller;
use think\Controller;

class Index extends Controller
{

    public function IndexAction(){
        return $this->fetch('Index'.DS.'Index');
    }
}