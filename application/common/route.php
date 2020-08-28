<?php
	namespace application\common;
	class route{

		public $Control; //控制器
		public $Action;  //方法
        public $Admin=false;
		public function __construct(){
			//xxx.com/index/index
            /**
                *隐藏index.php
                *获url参数
                *返回对应控制器和方法
             **/

            if (isset($_SERVER["REQUEST_URI"]) && $_SERVER["REQUEST_URI"]!="/"){
                //
                $url=$_SERVER["REQUEST_URI"];
                $controllerPath = controller;

                if(stripos($url,"?")!=""){  //查找 "?" 在字符串中第一次出现的位置
                    $url=substr($url,0,stripos($url,"?"));
                }

                if(stripos($url,".html")!=""){
                    $url=substr($url,0,stripos($url,".html"));
                }

                if(stripos($url,"/admin/")>=0 && ($url!="" && $url!="/")){
                    $this->Admin=true;
                    $controllerPath=adcontroller;
                    $url=str_ireplace("/admin/","",$url);
//                    if(stripos($url,"logincheckController")>=0){
//                        $url=substr($url,0,stripos($url,"Controller"));
//                    }
                }

                $urlArray = explode('/',trim($url,'/'));
                if (isset($urlArray[0]) && $urlArray[0]!=""){
                    $this->Control = $urlArray[0];
                    unset($urlArray[0]);
                }else{
                    $this->Control = "index";
                }
                if (isset($urlArray[1])&& $urlArray[1]!=""){
                    $this->Action = $urlArray[1];
                    unset($urlArray[1]);
                }else{
                    $this->Action = "index";
                }
//                write($urlArray);
                $count=count($urlArray)+2;
//                write($count);
                $i=2;
                while($count>$i){
                    if(isset($urlArray[$i+1])){
                        $_GET[$urlArray[$i]]=$urlArray[$i+1];
                    }
                    $i+=2;
                }
//                write($_GET);

            }else{
                $this->Control="index";
                $this->Action="index";
            }
	    }
	}
