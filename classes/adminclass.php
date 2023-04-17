<?php
class AdminClass extends DBClass
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
	
	function check_admin($_sAdminName='',$_sPassword='',$_sstatus='')
	{
		 
		//echo $_sAdminName;
	 	$sSqlCheckUser = "SELECT * from tbl_admin WHERE 1=1 ";
		
		if($_sAdminName !='')
		{
			$sSqlCheckUser.=" AND fld_username  = '".$_sAdminName."' ";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_sstatus !='')
		{
			$sSqlCheckUser.=" AND fld_status = '".$_sstatus."'";
		}
	 
		//echo $sSqlCheckUser;die;
		$this->execute_select_query($sSqlCheckUser); 
		$this->aAdmin = $this->aQueryData;
	    $this->iAdmin = $this->iTotalRecords;  
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
	
function get_admin($fld_id='', $fld_status='', $fld_email='',$searchinput='',$searchname='' )
	{
		 
		
	 	$sSqlCheckUser = "SELECT * from tbl_admin WHERE 1=1 ";
		
		if($fld_id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = ".$fld_id."";
		}
		
		if($fld_status !='')
		{
			$sSqlCheckUser.=" AND fld_status  = ".$fld_status."";
		}
		if($fld_email !='')
		{
			$sSqlCheckUser.=" AND fld_email  = '".$fld_email."' ";
		}
		
	if($searchname!='' && $searchinput!=''){
		
		$sSqlCheckUser.=" AND fld_email  = '".$fld_email."' ";
	  }
		
		
		//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser); 
		$this->aAdmin = $this->aQueryData;
	    $this->iAdmin = $this->iTotalRecords;  
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
	
	
	function get_city_state_country($fld_country='',$fld_state='',$fld_city='')
	{
		 
		//echo $_sAdminName;
	 	$sSqlCheckUser = "SELECT a.fld_id as fld_citymainid, a.fld_city_name,a.fld_state_id,a.fld_country_id, b.fld_id as fld_statemainid, 
						b.fld_state_name,b.fld_country_id,c.fld_country_name
						FROM  tbl_city AS a 
                        LEFT JOIN tbl_state AS b ON a.fld_state_id= b.fld_id
						LEFT JOIN tbl_country AS c ON a.fld_country_id=c.fld_id WHERE 1=1 ";
		
		if($fld_country !='')
		{
			$sSqlCheckUser.=" AND a.fld_country_id  = '".$fld_country."' ";
		}
		if($fld_state !='')
		{
			$sSqlCheckUser.=" AND a.fld_state_id = '".$fld_state."'";
		}
		if($fld_city !='')
		{
			$sSqlCheckUser.=" AND a.fld_id = '".$fld_city."'";
		}
	 
		//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser); 
		$this->aAdmin = $this->aQueryData;
	    $this->iAdmin = $this->iTotalRecords;  
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
		//print_r($this->aAdmin);
	}
	
	
	function get_users($_sAdminName='',$_sPassword='')
	{
		 
		//echo $_sAdminName;
	 	 $sSqlCheckUser = "SELECT * from tbl_user WHERE 1=1 "; 
		
		if($_sAdminName !='')
		{
			$sSqlCheckUser.=" AND fld_name  = '".$_sAdminName."' ";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_pwd = '".$_sPassword."'";
		}
	 
		//echo $sSqlCheckUser;die;
		$this->execute_select_query($sSqlCheckUser);  
		$this->aAdmin = $this->aQueryData;
	    $this->iAdmin = $this->iTotalRecords;  
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
	
	
	
	
	function change_admin_password($_iAdminId, $_sPassword)
	{
		$sSqlChangePassword = "UPDATE tbl_admin SET fld_admin_login_password ='".$_sPassword."' WHERE fld_admin_id = ".$_iAdminId;
		$this->execute_update_query($sSqlChangePassword);
		$this->aUserDetails = $this->aQueryData;
		$this->iTotalUsers = $this->iTotalRecords;
		$this->sUserError = $this->sQueryError;
		$this->sUserResult = $this->sQueryResult;
	}
	
	  function getAllMessage($account='',$personEmail='',$messageID='')
	{
		$sSqlResults = "SELECT * from  tbl_message_box  WHERE 1=1 ";
		
		
		
		if($personEmail !='')
		{
			$sSqlResults		.=	"AND fld_email like '%".$personEmail."%' ";
		}
		
		if($account !='')
		{
			$sSqlResults		.=	"AND fld_account_type = '{$account}'  ";
		}
		if($messageID !='')
		{
			$sSqlResults		.=	"AND fld_message_id = '{$messageID}'  ";
		}
		$sSqlResults		.=	" ORDER BY fld_message_id DESC ";
		//echo $sSqlResults.'<br>';
		
		$this->execute_select_query($sSqlResults);
		$this->aResults = $this->aQueryData;
	
		$this->iResults = $this->iTotalRecords;
		$this->sError   = $this->sQueryError;
		$this->sResult  = $this->sQueryResult;
	}

	function get_country($fld_country='',$fld_state='',$fld_city='')
	{
		 
		//echo $_sAdminName;
	 	$sSqlCheckUser = "SELECT a.fld_id AS fld_citymainid, a.fld_city_name, a.fld_state_id, a.fld_country_id, b.fld_id AS fld_statemainid, b.fld_state_name, b.fld_country_id, c.fld_country_name
FROM tbl_city AS a
LEFT JOIN tbl_state AS b ON a.fld_state_id = b.fld_id
LEFT JOIN tbl_country AS c ON a.fld_country_id = c.fld_id
ORDER BY c.fld_country_name DESC";
		
		if($fld_country !='')
		{
			$sSqlCheckUser.=" AND a.fld_country_id  = '".$fld_country."' ";
		}
		if($fld_state !='')
		{
			$sSqlCheckUser.=" AND a.fld_state_id = '".$fld_state."'";
		}
		if($fld_city !='')
		{
			$sSqlCheckUser.=" AND a.fld_id = '".$fld_city."'";
		}
	 
		//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser); 
		$this->aAdmin = $this->aQueryData;
	    $this->iAdmin = $this->iTotalRecords;  
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
		//print_r($this->aAdmin);
	}
	
	function get_city_state_country_edit($cityid)
	{
		 
		//echo $_sAdminName;
	 	$sSqlCheckUser = "SELECT a.fld_id as fld_citymainid, a.fld_city_name,a.fld_state_id,a.fld_country_id, b.fld_id as fld_statemainid, 
						b.fld_state_name,b.fld_country_id,c.fld_country_name
						FROM  tbl_city AS a 
                        LEFT JOIN tbl_state AS b ON a.fld_state_id= b.fld_id
						LEFT JOIN tbl_country AS c ON a.fld_country_id=c.fld_id WHERE a.fld_id= '".$cityid."'";
						
						
					//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser); 
		$this->aAdmin = $this->aQueryData;
	    $this->iAdmin = $this->iTotalRecords;  
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
		//print_r($this->aAdmin);
	}
						
	
}
?>