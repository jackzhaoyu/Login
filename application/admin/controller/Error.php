<?php
//declare (strict_types = 1);

namespace app\admin\controller;

use think\Request;

class Error
{

    public function __call($name, $arguments)
    {
        return apiArr(config("status.controller_not_found"), '后台控制器不存在', null, 404);
    }

    public function index()
    {
        return apiArr(config("status.controller_not_found"), '后台控制器不存在', null, 404);
    }

}
