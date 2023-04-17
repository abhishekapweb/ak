<?php
@ob_start();
@session_start();

error_reporting(2);
// DB Info
//$sLoacl = true;
$sLoacl = false;

if($sLoacl == true)
{
	define('sDBHOST','localhost');
	define('sDBUSERNAME','classify');
	define('sDBPASSWORD','uttarakhand@123');
	define('sDBNAME','classify');	
	define('sHOST','http://classify.com/');  			// for site url
	
}
else
{
   define('sDBHOST','localhost');
	define('sDBUSERNAME','root'); 
	define('sDBPASSWORD','');
	define('sDBNAME','classify');	
	define('sHOST','http://127.0.0.1/classify/');	// for localhost  url

}

if(!$_SESSION['USER_LOG']){
	$_SESSION['USER_LOG'] = date('ymdhis');
}

$sALLOWED_FLE = array('jpg','txt','pdf','xls','doc','docx','xlsx','ppt','pptx','csv');
$sALLOWED_EXT = array('jpg', 'gif', 'png' ,'doc','docx','jpeg');
$aTmpUri = explode("/", trim($_SERVER['REQUEST_URI']));

if(in_array("user", $aTmpUri))
{
	function __autoload($class_name) 
	{
		require_once "../classes/".strtolower($class_name).'.php';
	}	
}
elseif(in_array("admin", $aTmpUri))
{
	function __autoload($class_name) 
	{
		require_once "../classes/".strtolower($class_name).'.php';
	}	
}
else {
	function __autoload($class_name) 
	{
        //echo $class_name;
		require_once "classes/".strtolower($class_name).'.php';
	}	
	}


?>



