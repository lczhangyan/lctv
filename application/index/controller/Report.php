<?php
/**
 * Created by PhpStorm.
 * User: ZY
 * Date: 2018/5/24
 * Time: 22:58
 */

namespace app\index\controller;


use think\Controller;

class Report extends Controller
{
    public function rating_w(){
        return $this->fetch();
    }
    public function rating_w_z(){
        return $this->fetch();
    }
    public function channel_group_w(){
        return $this->fetch();
    }
    public function all_rating_w(){
        return $this->fetch();
    }
    public function five_minute_z(){
        return $this->fetch();
    }
    public function fiveMinute(){
        return $this->fetch();
    }
    public function top10_z(){
        return $this->fetch();
    }
    public function top10(){
        return $this->fetch();
    }
    //以下月报
    public function channel_group_m(){
        return $this->fetch();
    }
    public function all_rating_m(){
        return $this->fetch();
    }
    public function shandong_all_channel(){
        return $this->fetch();
    }
    public function five_minute_z_m(){
        return $this->fetch();
    }
    public function night_program(){
        return $this->fetch();
    }
    public function my_program(){
        return $this->fetch();
    }
}