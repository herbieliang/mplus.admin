<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

namespace app\manage;

class common{
    /**
     * 返回操作结果json数据
     * @param $code
     * @param $message
     * @param $url
     * @return array
     */
    public static function return_result($code, $message, $url){
        $result = array(
            'code'      =>  $code,
            'msg'       =>  $message,
            'url'       =>  $url
        );
        return $result;
    }
}