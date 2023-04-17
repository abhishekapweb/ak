<?php

class LocationClass extends DBClass 

{

	public $aLocation = array(); 

	public $iocation = 0;

	public $sError = '';

	public $sResult = '';

			

	function __construct() 

   	{

		parent::__construct();

		$aocation = array();

		$iocation = 0;

		$sError = '';

		$sResult = '';
		

	}

	

	function __destruct() 

   	{

		parent::__destruct();

   	}

	

		function getCountry($id='',$Country='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '')

	{

		$sSqlCheckUser = "SELECT * from countries WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND id  = '".$id."' ";

		}

		if($Category !='')

		{

			$sSqlCheckUser.=" AND country = '".$Country."'";

		}

		

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND flag = '".$_sStatus."'";

		}

		//echo $sSqlCheckUser;die;

		if($iOrderBy != '')
		{			
			$sSqlCheckUser 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlCheckUser		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlCheckUser		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
      // echo $sSqlCheckUser;
		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}

	

		function getState($id='',$countryId='',$stateName='', $flag='')

	{

		$sSqlCheckUser = "SELECT * from states WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND id  = '".$id."' ";

		}

		if($countryId !='')

		{

			$sSqlCheckUser.=" AND country_id = '".$countryId."'";

		}
                if($flag!='')

		{

			$sSqlCheckUser.=" AND flag = '".$flag."'";

		}
		
		

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}

		function getCity($id='',$stateId='',$cityName='', $flag='')

	{

		$sSqlCheckUser = "SELECT * from cities WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND id  = '".$id."' ";

		}

		if($stateId !='')

		{

			$sSqlCheckUser.=" AND state_id = '".$stateId."'";

		}
                if($flag!='')

		{

			$sSqlCheckUser.=" AND flag = '".$flag."'";

		}
		
		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}



}

?>

