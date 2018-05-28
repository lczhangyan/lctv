<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        if(!session("name")){
            return $this->redirect("login/logout");
        }
        $this->assign("name",session('name'));
        return $this->fetch();
    }
}
