<?php
	function Write($Obj){
		echo $Obj;
	}

	#将常量中的路径值替换为符合命名空的格式
	function RName($NameSpace){
		$NameSpace=str_replace(dir,"",$NameSpace);
		return str_replace("/","\\",$NameSpace);
	}
?>