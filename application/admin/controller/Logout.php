<?php
/**
 * Created by PhpStorm.
 * User: zhaoyu
 * Date: 2020/2/15
 * Time: 4:41 PM
 */

namespace app\admin\controller;

class Logout extends AdminBase
{
    public function index()
    {
//        Session::clear();
//        Session::delect(config("admin.session_admin"));
        session(config("adminuser.session_admin"),null);
        return redirect(config("adminuser.admin_url").'/login/index')->send();

    }
}