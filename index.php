<?php
	header("Content-type:text/html;charset=utf-8");
	
	define("dir",__dir__);
	define("commons",dir."/application/common/");
	define("controllers",dir."/application/mvc/controller/");
	define("models",dir."/application/mvc/model/");
	define("views",dir."/application/mvc/view/");

	#基础函数库
	include commons."/function.php";

	#导入程序入口
	include commons."/start.php";
		
	#注册自动加载类
	spl_autoload_register(RName(commons)."PageInit::load");

	\application\common\PageInit::start();
	
?>