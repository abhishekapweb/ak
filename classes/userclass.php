<?php
class UserClass extends DBClass
{
	public $aAdmin = array();
	public $iAdmin = 0;
	public $sError = '';
	public $sResult = '';
			
	function __construct() 
   	{
		parent::__construct();
		$aAdmin = array();
		$iAdmin = 0;
		$sError = '';
		$sResult = '';
	}
	
	function __destruct() 
   	{
		parent::__destruct();
   	}
	function check_usernow($_sAdminName='',$_sPassword='', $_iAdminId='', $_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_customer WHERE 1=1 ";
		
		if($_sAdminName !='')
		{
			$sSqlCheckUser.=" AND fld_email  = '".$_sAdminName."' ";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_iAdminId !='')
		{
			$sSqlCheckUser.=" AND fld_id = '".$_iAdminId."'";
		}
		if($_sStatus !='')
		{
			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";
		}
		//echo $sSqlCheckUser;die;
		
		$this->execute_select_query($sSqlCheckUser);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
		function check_admin($_sAdminName='',$_sPassword='', $_iAdminId='', $_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_admin WHERE 1=1 ";
		if($_sAdminName !='')
		{
			$sSqlCheckUser.=" AND fld_username  = '".$_sAdminName."' ";
		}
		/*if($_sAdminName !='')
		{
			$sSqlCheckUser.=" OR fld_email  = '".$_sAdminName."' ";
		}*/
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_iAdminId !='')
		{
			$sSqlCheckUser.=" AND fld_id = '".$_iAdminId."'";
		}
		if($_sStatus !='')
		{
			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";
		}
		//echo $sSqlCheckUser;die;
		
		$this->execute_select_query($sSqlCheckUser);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
	function check_user($_sAdminName='',$_sPassword='', $_iAdminId='', $_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_customer WHERE 1=1 ";
		if($_sAdminName !='')
		{
			$sSqlCheckUser.=" AND fld_name  = '".$_sAdminName."' ";
		}
		if($_sAdminName !='')
		{
			$sSqlCheckUser.=" OR fld_email  = '".$_sAdminName."' ";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_iAdminId !='')
		{
			$sSqlCheckUser.=" AND fld_id = '".$_iAdminId."'";
		}
		if($_sStatus !='')
		{
			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";
		}
		//echo $sSqlCheckUser;die;
		
		$this->execute_select_query($sSqlCheckUser);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
	
    function changeStatus($tableName ,$id , $fldName , $status){

    if($status==1){
      $sSqlResults="UPDATE $tableName SET `fld_status`= '0' WHERE $fldName=$id";
	  //echo $sSqlResults;
	  	$this->execute_update_query($sSqlResults);
	}
	else{
      $sSqlResults="UPDATE $tableName SET `fld_status`= '1' WHERE $fldName=$id";
     //   echo $sSqlResults;
	  	$this->execute_update_query($sSqlResults);
	}
	
	}
	
	 function getCountry()
	{
		$sSqlResults = "SELECT * FROM tbl_country WHERE 1=1  ";		
		
			
//echo $sSqlResults.'<br>';
		
		$this->execute_select_query($sSqlResults);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError   = $this->sQueryError;
		$this->sResult  = $this->sQueryResult;
	}
	
	function getStates($id='', $fld_country_id='')
	{
		$sSqlResults = "SELECT * FROM tbl_state WHERE 1=1  ";
			
		 if($id != '' ) 
		{
			$sSqlResults 		.=	"AND fld_id = '{$id}' ";
		
		}	
		if($fld_country_id != '' ) 
		{
			$sSqlResults 		.=	"AND fld_country_id = '{$fld_country_id}' ";
		
		}	
		
			
       //echo $sSqlResults.'<br>';
		
		$this->execute_select_query($sSqlResults);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError   = $this->sQueryError;
		$this->sResult  = $this->sQueryResult;
	}
	function getCity($id='', $fld_state_id='',$_sStatus='')
	{
		$sSqlResults = "SELECT * FROM tbl_city WHERE 1=1  ";
			
		 if($id != '' ) 
		{
			$sSqlResults 		.=	"AND fld_id = '{$id}' ";
		
		}	
		if($fld_state_id != '' ) 
		{
			$sSqlResults 		.=	"AND fld_state_id = '{$fld_state_id}' ";
		
		}	
		
		if($_sStatus !='')
		{
			$sSqlResults.=" AND fld_status = '".$_sStatus."'";
		}
			
//echo $sSqlResults.'<br>';
		
		$this->execute_select_query($sSqlResults);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError   = $this->sQueryError;
		$this->sResult  = $this->sQueryResult;
	}
	function getAllDetails()
	{
		$sSqlResults="SELECT fld_country_name, fld_state_name, fld_city_name FROM tbl_city LEFT JOIN tbl_state ON tbl_city.fld_state_id = tbl_state.fld_id
LEFT JOIN tbl_country ON tbl_state.fld_country_id = tbl_country.fld_id";
		
		
		if($id != '' ) 
		{
			$sSqlResults 		.=	"AND fld_id = '{$id}' ";
		
		}	
	    if($fld_country_name != '' ) 
		{
			$sSqlResults 		.=	"AND fld_country_name = '{$fld_country_name}' ";
		
		}	
		
		$this->execute_select_query($sSqlResults);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError   = $this->sQueryError;
		$this->sResult  = $this->sQueryResult;
		
		}
}
?>
