<?php
/**
 * Created by zhangyan
 * Date: 2018/5/24
 * Time: 15:09
 * action:
 */

namespace app\index\controller;
use app\index\model\User;
use think\Controller;

class Login extends Controller
{
    public function logins(){
        header("Content-type: application/json; charset=UTF-8");
        $request = $this->request;
        $name = $request->param("name");
        $password =$request->param("password");
        $M = new User();
        $pass = $M->where("accounts",$name)->find();
        $data = [];
        if($pass){
            $password = md5($name.'-'.$password);
            if($password==$pass->password){
                session("user_type",$pass->usertype);
                session("name",$pass->name);
                session("accounts",$name);
                $data["msg"] = "成功";
                $data["code"] = 0;
            }else{
                $data["msg"] = "密码错误";
                $data["code"] = 1;
            }
        }else{
            $data["msg"] = "用户名不存在";
            $data["code"] = 1;
        }
        echo json_encode($data,320);
        exit();
    }
    public function login(){
        return $this->fetch();
    }
    public function logout(){
        session(null);
        return $this->fetch("login");
    }
    public function p_reset(){
        return $this->fetch();
    }
    public function reset(){
        header("Content-type: application/json; charset=UTF-8");
        $request = $this->request;
        $npass = $request->param("npass");
        $npass1 = $request->param("npass1");
        $resp = array();
        if($npass!=$npass1){
            $resp['code'] = 1;
            $resp['msg'] = "密码不一致";
        }else{
            $accounts = session("accounts");
            $M = new User();
            $data = $M->where("accounts",$accounts)->find();
            $password = $data->password;
            $id = $data->id;
            $pass = $request->param("pass");
            $tem_password = md5($accounts."-".$pass);
            if($tem_password!=$password){
                $resp['code'] = 1;
                $resp['msg'] = "原密码不正确";
            }else{
                $tem_password1 = md5($accounts.'-'.$npass);
                $M->where('id',$id)->update(['password'=>$tem_password1]);
                $resp['code'] = 0;
                $resp['msg'] = "修改成功";
            }
        }
        echo json_encode($resp,320);
        exit();
    }
}