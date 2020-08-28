<?php


namespace application\mvc\controller\admin;


use application\mvc\model\Database;

class logincheck{
    public function index(){
        if(isset($_GET["state"])){
            session_start();
            //session_unset();
            //$_SESSION['user'] = null;
            //unset($_SESSION['user']);
            session_destroy();
            header("location:/admin/login");

        }else{
            $name = $_POST["name"];
            $pwd = md5($_POST["pwd"]);
            $model = new \application\mvc\model\Database();
            $model->table = "admin";
            $model->where = "aname = '$name' and apwd = '$pwd'";

            $selArray = $model->select()->fetchAll();

            if (count($selArray)==1){
                session_start();
                $_SESSION["admin"] = $selArray[0]["aname"];

                $model->fields="lastdate,logincount";
                $model->values="now(),logincount+1";
                $model->update();
                echo "ok";
            }else{
                echo "账号密码有误";
            }
        }

    }

}