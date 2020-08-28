<?php


namespace application\mvc\controller\admin;


class index extends base {
    public function index(){
        $db = new \application\mvc\model\Database();
        $url = adview."index.html";
//        echo $url;
        include $url;
    }
}