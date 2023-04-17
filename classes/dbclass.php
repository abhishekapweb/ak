<?php
class DBClass
{
	private $sDatabaseServer;
	public $sDatabaseName;
	private $sDatabaseUser;
	private $sDatabasePassword;
	
	protected $aQueryData = array();
	protected $iTotalRecords = 0;
	protected $iNewInsertedId = '';
	protected $sQueryError = '';
	protected $sQueryResult = '';
	
	function __construct() 
   	{
		$this->sDatabaseServer = sDBHOST;
		$this->sDatabaseUser = sDBUSERNAME;
		$this->sDatabasePassword = sDBPASSWORD;
		$this->sDatabaseName = sDBNAME;

		
		$this->oConn = mysqli_connect($this->sDatabaseServer,$this->sDatabaseUser,$this->sDatabasePassword) or die(mysqli_error($this->oConn));
		//$this->oConn = new mysqli($this->sDatabaseServer,$this->sDatabaseUser,$this->sDatabasePassword);
		//if ($this->oConn->connect_error) {
           // die("Connection failed: " . $this->oConn->connect_error);
        //}
        //echo "string5";die;
		$this->oConn->select_db($this->sDatabaseName);
		
		$this->aQueryData = array();
		$this->iTotalRecords = 0;
		$this->iNewInsertedId = '';
		$this->sQueryError = '';
		$this->sQueryResult = '';
   	}
	
	function __destruct()
	{
		mysqli_close($this->oConn);
	}
	
	protected function execute_select_query($_sQuery)
	{
		
		$this->aQueryData = array();
		$this->iTotalRecords = 0;
		$this->iNewInsertedId = '';
		$this->sQueryError = '';
		$this->sQueryResult = '';
		$oQueryResult = mysqli_query($this->oConn,$_sQuery);
		if ($oQueryResult)
		{
			$this->iTotalRecords = @mysqli_num_rows($oQueryResult);
			if ($this->iTotalRecords > 0)
			{
				
				while ($aData = mysqli_fetch_assoc($oQueryResult))
				{
				
				foreach($aData as $kd=>$kv)
				{
					
					if(is_array($kv))
					{
						foreach($kv as $kd1=>$kv1)
						{
							$kvdata[$kd1]=stripslashes($kv1);
						}
						$aData1[$kd]=$kvdata;
					}
				else{
						$aData1[$kd]=stripslashes($kv);
					}
				}
				
					$this->aQueryData[] = $aData1;
					
				}
				$this->sQueryResult = "Records Found";
			}
			else
			{
				$this->sQueryResult = "Records Not Found";
			}
			@mysqli_free_result($oQueryResult);
		}
		else
		{
			$this->sQueryError = $_sQuery." <br> ".mysqli_error($this->oConn);
		}
	}
	
	protected function execute_insert_query($_sQuery)
	{			
		$this->aQueryData = array();
		$this->iTotalRecords = 0;
		$this->iNewInsertedId = '';
		$this->sQueryError = '';
		$this->sQueryResult = '';
		$oQueryResult = mysqli_query($this->oConn,$_sQuery);
		if ($oQueryResult)
		{
			$this->iNewInsertedId = mysqli_insert_id();
			$this->sQueryResult = 'Record(s) Inserted';
		}
		else
		{
			$this->sQueryError = $_sQuery." <br> ".mysqli_error($this->oConn);
		}
	}
	
	protected function execute_delete_query($_sQuery)
	{			
		$this->aQueryData = array();
		$this->iTotalRecords = 0;
		$this->iNewInsertedId = '';
		$this->sQueryError = '';
		$this->sQueryResult = '';
		$oQueryResult = mysqli_query($this->oConn,$_sQuery);
		if ($oQueryResult)
		{
			$this->sQueryResult = "Record(s) Deleted";
		}
		else
		{
			$this->sQueryError = $_sQuery." <br> ".mysqli_error($this->oConn);
		}
	}
	
	protected function execute_update_query($_sQuery)
	{			
		$this->aQueryData = array();
		$this->iTotalRecords = 0;
		$this->iNewInsertedId = '';
		$this->sQueryError = '';
		$this->sQueryResult = '';
		$oQueryResult = mysqli_query($this->oConn,$_sQuery);
		if ($oQueryResult)
		{
			$this->sQueryResult = "Record(s) Updated";
		}
		else
		{
			$this->sQueryError = $_sQuery." <br> ".mysqli_error($this->oConn);
		}
	}
}
?>
