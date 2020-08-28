<?php
	namespace application\common;
class pageInit{
    public static $classArray = array();
    static public function start(){
        #创建路由对象
        $route = new route();
//        write($route);
        $controlClass = $route->Control;
        $action = $route->Action;
//        if ($controlClass="admin"){
//            $controlFile = controller."/admin/".$action."Controller.php";
//            $ctrlClass = "\\".module."\\admin\\".$action."Controller";
//        }elseif ($controlClass="login"){
//            $controlFile = controller."/admin/".$controlClass."Controller.php";
//            $ctrlClass = "\\".module."\\admin\\".$controlClass."Controller";
//
//        }else{

            if($route->Admin){
                $controller=adcontroller;
                $module = admodule;
            }else{
                $controller = controller;
                $module = module;
            }
            $controlFile = $controller."/".$controlClass.".php";
            $ctrlClass = "\\".$module."\\".$controlClass;
    //      write($ctrlClass);write($controlFile);write($controlClass);write($controller);
        if (is_file($controlFile)){
            include $controlFile;
            $control = new $ctrlClass();
            $control->$action();
        }else{
            throw new \PDOException("找不到控制器");
        }
    }

    #自动加载类文件的方法
    static public function load($classname){
//      application\common\route();
//      $classname = 'application/common/route';
//      echo common.'/route.php';
//        write($classname);
//        write(common.$classname.".php");
        if(isset($classArray[$classname])){
            return true;
        }else{
            $classname = str_replace("\\","/",$classname);
            $file = dir."/".$classname.".php";
            if(is_file($file)){
                include $file;
                self::$classArray[$classname] = $classname;
            }else{
                return false;
            }
        }
    }

}