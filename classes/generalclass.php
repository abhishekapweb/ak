<?php
class GeneralClass extends DBClass
{ 	
	function get_records($_sTableName, $_sSelectField, $_sMatchFieldName='', $_sMatchFieldValue='')
	{
		$_sSelectQuery = "SELECT $_sSelectField FROM $_sTableName WHERE 1 = 1";
		if($_sMatchFieldValue != "")
		{
			$_sSelectQuery.= " AND $_sMatchFieldName = '".$_sMatchFieldValue."'";
		}	
		
		//echo $_sSelectQuery;die;
		$this->execute_select_query($_sSelectQuery);
		$this->aRowData = $this->aQueryData;
		return $this->aRowData[0][0];
	}
	
	function get_countRecord($_sTableName, $_sSelectField, $_sMatchFieldName='', $_sMatchFieldValue='',$_statusValue='',$_sMatchFieldName1='', $_sMatchFieldValue1='')
	{
		$_sSelectQuery = "SELECT count(DISTINCT $_sSelectField) FROM $_sTableName WHERE 1 = 1";
		if($_sMatchFieldValue != "")
		{
			$_sSelectQuery.= " AND $_sMatchFieldName = '".$_sMatchFieldValue."'";
		}	
        if($_sMatchFieldValue1 != "")
		{
			$_sSelectQuery.= " AND $_sMatchFieldName1 = '".$_sMatchFieldValue1."'";
		}
		if($_statusValue != "")
		{
			$_sSelectQuery.= " AND fld_status = '1' ";
		}
		//echo $_sSelectQuery;
		$this->execute_select_query($_sSelectQuery);
		$this->iRowData = $this->aQueryData;
		return $this->iRowData;
	
	}
	
	function update_data($_sTableName, $_sMatchFld, $_aData, $_iRecId, $md5='') 
	{
		$fld_str = "";
		$val_str = "";
		if($_sTableName && is_array($_aData))
		{	
			$_sSelectQuery = "SHOW COLUMNS FROM `$_sTableName`";
			$this->execute_select_query($_sSelectQuery);
			$this->aColoumData = $this->aQueryData;
			$this->iColoumData = $this->iTotalRecords;
			$this->sError = $this->sQueryError;
			$this->sResult = $this->sQueryResult;
			for($i=0; $i<$this->iColoumData; $i++)
			{
				$aDataArray[] = $this->aColoumData[$i]['Field'];
			}
			foreach($_aData as $key=>$val)
			{	
				if(in_array($key, $aDataArray))
				{
					$fld_str.="$key,";	

					if($val=='now()')
					{	
						$val_str.= "$key=".mysqli_real_escape_string($this->oConn,trim($val)).",";
					}	
					else
					{
						$val_str.="$key='".mysqli_real_escape_string($this->oConn,trim($val))."',";
					}	
				}
			}
			$val_str=substr($val_str,0,-1);
			if($md5!='') $_sMatchFld='MD5('.$_sMatchFld.')';
		    $_sUpdateQuery = "UPDATE $_sTableName SET $val_str WHERE ".$_sMatchFld." IN (".$_iRecId.") ";
			//echo $_sUpdateQuery ;die;
			//exit;
			$_sUpdateQuery = str_replace("'on'", "'1'", $_sUpdateQuery);
			
			//echo $_sUpdateQuery;die;
			$this->execute_update_query($_sUpdateQuery);
			return mysqli_affected_rows($this->oConn);
		}
	}

	function cwUpload($target_path = '',$file_name = '', $thumb_folder = '', $thumb_width = '', $thumb_height = ''){
	
	$thumb_path = $thumb_folder;
	
	
	$upload_image = $target_path.basename($file_name);
	
	
		//thumbnail creation
		
			$thumbnail = $thumb_path.$file_name;
			list($width,$height) = getimagesize($upload_image);
			$thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
			switch($file_ext){
				case 'jpg':
					$source = imagecreatefromjpeg($upload_image);
					break;
				case 'jpeg':
					$source = imagecreatefromjpeg($upload_image);
					break;
				case 'png':
					$source = imagecreatefrompng($upload_image);
					break;
				case 'gif':
					$source = imagecreatefromgif($upload_image);
					break;
				default:
					$source = imagecreatefromjpeg($upload_image);
			}
			imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
			switch($file_ext){
				case 'jpg' || 'jpeg':
					imagejpeg($thumb_create,$thumbnail,100);
					break;
				case 'png':
					imagepng($thumb_create,$thumbnail,100);
					break;
				case 'gif':
					imagegif($thumb_create,$thumbnail,100);
					break;
				default:
					imagejpeg($thumb_create,$thumbnail,100);
			}
	

		return $file_name;
	
}
	function insert_data($_sTableName,$_aData) 
	{
		$fld_str='';
		$val_str='';
		if($_sTableName && is_array($_aData) && !empty($_aData))
		{
			$_sSelectQuery="SHOW COLUMNS FROM `$_sTableName`";
		
			$this->execute_select_query($_sSelectQuery);
			
			$this->aColoumData = $this->aQueryData;
			$a=$this->aColoumData;
			
			$this->iColoumData = $this->iTotalRecords;
			$this->sError = $this->sQueryError;
			$this->sResult = $this->sQueryResult;
			for($i=0; $i<$this->iColoumData; $i++)
			{
				$aDataArray[] = $this->aColoumData[$i]['Field'];
			}
			
			foreach($_aData as $key=>$val)
			{	
				if(in_array($key, $aDataArray))
				{
					$fld_str.="$key,";	
					if($val=='now()')
					{	
						$val_str.= mysqli_real_escape_string($this->oConn,trim($val)).",";
					}	
					else
					{
						$val_str.="'".mysqli_real_escape_string($this->oConn,trim($val))."',";
					}	
				}
			}
			$fld_str=substr($fld_str,0,-1);
			$val_str=substr($val_str,0,-1);
			$_sInsertQuery=" INSERT INTO $_sTableName ($fld_str) VALUES ($val_str)";
		//echo $_sInsertQuery;die;
			$this->execute_select_query($_sInsertQuery);
			
			return mysqli_insert_id();
		}
	}
	
	function check_duplicate_record($_tablName,$_matchfield,$_rRecordId,$_match_field_old='',$_rRecordId_old='')
	{
		$selQuery="SELECT * FROM $_tablName WHERE $_matchfield='".$_rRecordId."'";
		if($_match_field_old!='')
		{
			$selQuery.="AND $_match_field_old <>".$_rRecordId_old;
		}
		//echo $selQuery;
		$this->execute_select_query($selQuery);
		$this->acount = $this->aQueryData;
		$this->icount = $this->iTotalRecords;
	}
		function check_user_login($_tablName,$_matchfield,$_rRecordId,$_match_field_old='',$_rRecordId_old='')
	{
		$selQuery="SELECT * FROM $_tablName WHERE $_matchfield='".$_rRecordId."'";
		if($_match_field_old !='')
		{		
		   $selQuery.=" and $_match_field_old='".$_rRecordId_old."'";
		 }
	    //echo $selQuery;
		//exit();
		$this->execute_select_query($selQuery);
		$this->acount = $this->aQueryData;
		$this->icount = $this->iTotalRecords;
	}
	
	function upload_files($_aAllowedExtension, $_aFile, $_sDestinationPath, $_sNewFileName, $_size=5242880)
	{
	 /*   print_r($_aAllowedExtension);
		echo'<pre>';
		print_r($_aFile);
		echo $_sDestinationPath;
		echo $_sNewFileName;
		exit();*/
		//print_r($_aFile);die;
		$ext=explode('.', $_aFile['name']);  //Get the extention of File 
		$ext=strtolower(end($ext));	//To get the extention and change it lower case
		if($_aFile['size']<$_size && $_aFile['size']!=0)  //Check the size of File
		{
			if(is_array($_aAllowedExtension) ? (in_array($ext, $_aAllowedExtension)) : false)
			{
				$sDbFileName = $_sNewFileName.".".$ext;
			 // echo $_sDestinationPath;die;
				if(move_uploaded_file($_aFile['tmp_name'], $_sDestinationPath.'/'.$sDbFileName)):
				chmod($_sDestinationPath.'/'.$sDbFileName, 0777);
				$sMessege = "0";    //File has been uploaded Successfulley
				else:
				$sMessege = "26";    //There is a problem with the File uploading please try Again
				endif;
			}
			else
			{
				$sMessege = "27";    //Please select allowed extension
			}			
		}
		else 
		{
			$sMessege = "28";    //Please select a File to Upload
		}
		return $sMessege;
	}
	
	function delete_record($_tablName,$_matchfield,$_rRecordId)
	{
		$delQuery="DELETE FROM $_tablName WHERE $_matchfield IN (".$_rRecordId.") ";
	
	
		$this->execute_delete_query($delQuery);
		$this->sResult =$this->sQueryResult ;
	}

	
	function date_format($_sDate)
	{
		$aTmpDate = explode(" ", $_sDate);
		if($aTmpDate[0] != '')
		{
			$aNewTmpDate = explode("-", $aTmpDate[0]);
			$sNewDate = date("M d Y", mktime(0, 0, 0, $aNewTmpDate[1], $aNewTmpDate[2], $aNewTmpDate[0]));;
		}
		return $sNewDate;
	}
	

	
	

}
?>