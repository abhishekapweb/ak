<?php require_once('../configuration/configuration.php');

$oGeneral	= new GeneralClass();

/*----------Delete Class Name------------*/

	$sMatchId		=	trim($_REQUEST['id']);
	$sTablName		=	'tbl_city_hotel';
	$sMatchfield	=	'fld_id';	
	
	
		$oGeneral->delete_record($sTablName, $sMatchfield, $sMatchId);
		
		echo "Row is Deleted Successfully";
		
?>