<?php
	namespace application\common;
	class PageInit{
		static public function start(){
			#$page=new \application\mvc\controller\index();
			#$page->index();

			#创建路由对象
			$route=new Route();

			#获得路由中的控制器名称和方法名
			$Ctrl=RName(controllers).$route->Control;
			$Action=$route->Action;
			
			#创建控制器对象
			$Page=new $Ctrl;
			$Page->$Action();
		}
		
		#存储已加载的类库文件
		public static $filearray=array();

		#自动加载类文件的方法
		static public function load($classname){
			$classfile=$classname;
			if(!isset($filearray[$classname])){				
				$classfile=str_replace("\\","/",$classfile).".php";
				if(is_file($classfile)){
					$filearray[$classname]=$classname;
					include $classfile;
				}else{
					return false;
				}
			}
		}
	}
?>