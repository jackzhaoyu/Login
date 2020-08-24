<?php
/**
 * Created by PhpStorm.
 * User: 努克萨斯
 * Date: 2020/2/24
 * Time: 9:28 AM
 */

namespace app\admin\controller;

use think\Controller;
use think\exception\HttpResponseException;

class AdminBase extends Controller
{
    public $adminUser = null;

    public function initialize(){
        parent::initialize();
        if (empty($this->isLogin())){
            return redirect(config("adminuser.admin_url")."/login/index",302)->send();
        }
    }

    public function isLogin()
    {
        $this->adminUser = session(config("adminuser.session_admin"));
        if (empty($this->adminUser))
        {
            return false;
        }
        return true;
    }


    /*public function redirect(...$args)
    {
        throw new HttpResponseException(redirect(...$args));
    }*/
}