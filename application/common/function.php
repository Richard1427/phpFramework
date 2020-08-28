<?php
	function write($obj){
		if (is_array($obj)){
		    echo "<div>".var_dump($obj)."<div>";
        }elseif(is_null($obj)){
		    echo "<div>".var_dump(null)."<div>";
        }else{
            echo "<div>".$obj."<div>";
        }
	}
    #置换命名空间
    function RName($NameSpace){
        $NameSpace=str_replace(dir,"",$NameSpace);
        return str_replace("/","\\",$NameSpace);
    }