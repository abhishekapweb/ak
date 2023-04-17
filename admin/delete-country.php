<?php require_once('../configuration/configuration.php');

$oGeneral	= new GeneralClass();

/*----------Delete Class Name------------*/

	$sMatchId		=	trim($_REQUEST['id']);
	$sTablName		=	'countries';
	$sMatchfield	=	'id';	
	
	
		$oGeneral->delete_record($sTablName, $sMatchfield, $sMatchId);
		
		echo "Row is Deleted Successfully";
		
?>