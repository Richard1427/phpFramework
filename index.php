<?php
#入口文件=>定义常量=>引入函数=>库自动加载类=>返回结果=>加載控制器=>路由解析=>启动框架

#入口文件

#1.定义常量
#地址
header("Content-type:text/html;charset=utf-8");
define("dir",__dir__);
define("common",dir."/application/common");
define("controller",dir."/application/mvc/controller");
define("adcontroller",dir."/application/mvc/controller/admin");
define("model",dir."/application/mvc/model");
define("adview",dir."/application/mvc/view/admin/");
define("adtemplate","/application/mvc/view/admin/");

#方法
define("module","application\mvc\controller");
define("admodule","application\mvc\controller\admin");


#2.加载数据库
#基础函数库
include common."/function.php";
#导入程序入口
include common."/start.php";
#自动加载类
spl_autoload_register('\application\common\pageInit::load');
#数据库读取站点
$tem =new \application\mvc\model\templates();
//echo $tem->read(1)[0]["URL"];
define("template","/application/mvc/view/font/".$tem->read(1)[0]["URL"]."/");
define("view",dir."/application/mvc/view/font/".$tem->read(1)[0]["URL"]."/");

#3.启动框架
\application\common\pageInit::start();


