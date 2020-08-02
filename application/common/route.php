<?php
	namespace application\common;
	class Route{

		public $Control="index";
		public $Action="index";
		public function __construct(){
			#如果地址中存在?的数据，则将问号的数据取消

			$Urls=$_SERVER["REQUEST_URI"];

			$Urls=trim($Urls,"/");
			$UrlArr=explode("/",$Urls);
			if(isset($UrlArr[0]) && $UrlArr[0]!=""){				
				$controlfile=controllers.$UrlArr[0].".php";				
				if(is_file($controlfile)){
					$this->Control=$UrlArr[0];
				}else{
					$this->Control="error";
				}
				Unset($UrlArr[0]); 
			}
			if(isset($UrlArr[1]) && $UrlArr[1]!=""){
				if($this->Control!=""){
					$this->Action=$UrlArr[1];
					Unset($UrlArr[1]);
				}
			}
			
			
			$count=count($UrlArr)+2;
			$i=2;
			while($count>$i){
				if(isset($UrlArr[$i+1])){
					$_GET[$UrlArr[$i]]=$UrlArr[$i+1];					
				}
				$i+=2;
			}
		}
	}
?>