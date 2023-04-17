<?php
class BranchClass extends DBClass
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
	
		function getBranch($Id,$_sEmailBranch='',$_sPassword='',$_sNameBranch='', $_sStatus='',$_sBranchId='',$_sSearchNameBranch='')
	{
		$sSqlCheckUser = "SELECT * from tbl_branch WHERE 1=1 ";
		if($_sBranchId !='')
		{
			$sSqlCheckUser.=" AND fld_branchcode  = '".$_sBranchId."' ";
		}
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		if($_sEmailBranch !='')
		{
			$sSqlCheckUser.=" AND fld_email = '".$_sEmailBranch."'";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_sNameBranch !='')
		{
			$sSqlCheckUser.=" AND fld_branch = '".$_sNameBranch."'";
		}
		if($_sSearchNameBranch !='')
		{
			$sSqlCheckUser.=" AND fld_branch LIKE  '%".$_sSearchNameBranch."%' ";
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
	
	function getBranchManager($Id,$_sEmailBranch='',$_sPassword='',$_sManagerBranch='', $_sStatus='',$_sBranchId='',$_sSearchNameBranch='')
	{
		$sSqlCheckUser = "SELECT * from tbl_branch_manager WHERE 1=1 ";
		if($_sBranchId !='')
		{
			$sSqlCheckUser.=" AND fld_branch  = '".$_sBranchId."' ";
		}
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		if($_sEmailBranch !='')
		{
			$sSqlCheckUser.=" AND fld_email = '".$_sEmailBranch."'";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_sManagerBranch !='')
		{
			$sSqlCheckUser.=" AND fld_branchmanager = '".$_sManagerBranch."'";
		}
		
		if($_sStatus !='')
		{
			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";
		}
		//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
	function getBranchProcesser($Id,$_sEmailBranch='',$_sPassword='',$_sManagerBranch='', $_sStatus='',$_sBranchId='',$_sSearchNameBranch='')
	{
		$sSqlCheckUser = "SELECT * from tbl_manage_processer WHERE 1=1 ";
		if($_sBranchId !='')
		{
			$sSqlCheckUser.=" AND fld_branch  = '".$_sBranchId."' ";
		}
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		if($_sEmailBranch !='')
		{
			$sSqlCheckUser.=" AND fld_email = '".$_sEmailBranch."'";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_sManagerBranch !='')
		{
			$sSqlCheckUser.=" AND fld_branchmanager = '".$_sManagerBranch."'";
		}
		
		if($_sStatus !='')
		{
			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";
		}
		//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
	
	function getSalesManager($Id,$_sEmailBranch='',$_sPassword='',$_sManagerBranch='', $_sStatus='',$_sBranchId='',$_sSearchNameBranch='')
	{
		$sSqlCheckUser = "SELECT * from tbl_sales_manager WHERE 1=1 ";
		if($_sBranchId !='')
		{
			$sSqlCheckUser.=" AND fld_branch  = '".$_sBranchId."' ";
		}
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		
		if($_sEmailBranch !='')
		{
			$sSqlCheckUser.=" AND fld_email = '".$_sEmailBranch."'";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_sManagerBranch !='')
		{
			$sSqlCheckUser.=" AND fld_branchmanager = '".$_sManagerBranch."'";
		}
		
		if($_sStatus !='')
		{
			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";
		}
		//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
	function getSalesExecutive($Id,$_sEmailBranch='',$_sPassword='',$_sManagerBranch='', $_sStatus='',$_sBranchId='',$_sSalesmanager='')
	{
		$sSqlCheckUser = "SELECT * from tbl_sales_executive WHERE 1=1 ";
		if($_sBranchId !='')
		{
			$sSqlCheckUser.=" AND fld_branch  = '".$_sBranchId."' ";
		}
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		
		if($_sEmailBranch !='')
		{
			$sSqlCheckUser.=" AND fld_email = '".$_sEmailBranch."'";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_sManagerBranch !='')
		{
			$sSqlCheckUser.=" AND fld_branchmanager = '".$_sManagerBranch."'";
		}
		if($_sSalesmanager !='')
		{
			$sSqlCheckUser.=" AND fld_salesmanager = '".$_sSalesmanager."'";
		}
		if($_sStatus !='')
		{
			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";
		}
		//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
		function getBroker($Id,$_sEmailBranch='',$_sPassword='',$_sManagerBranch='', $_sStatus='',$_sBranchId='',$_sSearchNameBranch='')
	{
		$sSqlCheckUser = "SELECT * from tbl_broker WHERE 1=1 ";
		if($_sBranchId !='')
		{
			$sSqlCheckUser.=" AND fld_branch  = '".$_sBranchId."' ";
		}
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		
		if($_sEmailBranch !='')
		{
			$sSqlCheckUser.=" AND fld_email = '".$_sEmailBranch."'";
		}
		if($_sPassword !='')
		{
			$sSqlCheckUser.=" AND fld_password = '".$_sPassword."'";
		}
		if($_sManagerBranch !='')
		{
			$sSqlCheckUser.=" AND fld_branchmanager = '".$_sManagerBranch."'";
		}
		if($_sSearchNameBranch !='')
		{
			$sSqlCheckUser.=" AND fld_branch_manager LIKE  '%".$_sSearchNameBranch."%' ";
		}
		if($_sStatus !='')
		{
			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";
		}
		//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
			function getFestival($Id,$_sName='',$_sDate='')
	{
		$sSqlCheckUser = "SELECT * from tbl_festival WHERE 1=1 ";
		if($_sBranchId !='')
		{
			$sSqlCheckUser.=" AND fld_branch  = '".$_sBranchId."' ";
		}
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		if($_sName !='')
		{
			$sSqlCheckUser.=" AND fld_festival  = '".$_sName."' ";
		}
		if($_sDate !='')
		{
			$sSqlCheckUser.=" AND fld_date  = '".$_sDate."' ";
		}
	
		//echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser);
		$this->aResults = $this->aQueryData;
		$this->iResults = $this->iTotalRecords;
		$this->sError = $this->sQueryError;
		$this->sResult = $this->sQueryResult;
	}
}
?>
