<?php
/**
 * Created by PhpStorm.
 * User: zhaoyu
 * Date: 2020/2/20
 * Time: 3:26 PM
 */

namespace app\admin\controller;



class Index extends AdminBase
{

    public function index()
    {

//        $a = session(config("adminuser.session_admin"));
//        dump($a);die;
        return $this->fetch();
    }

    public function welcome()
    {
        return $this->fetch();
    }
}