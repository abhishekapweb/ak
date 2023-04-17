<?php

class ProductClass extends DBClass 

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

	

		function getCategory($id='',$Category='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '')

	{

		$sSqlCheckUser = "SELECT * from tbl_category WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}

		if($Category !='')

		{

			$sSqlCheckUser.=" AND fld_category = '".$Category."'";

		}

		

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";

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

	

		function getSubCategory($id='',$Category='',$subCategory='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '',$flag='')

	{

		$sSqlCheckUser = "SELECT * from tbl_subcategory WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}

		if($Category !='')

		{

			$sSqlCheckUser.=" AND fld_category = '".$Category."'";

		}
                if($flag!='')

		{

			$sSqlCheckUser.=" AND fld_flag = '".$flag."'";

		}
		
		if($subCategory !='')

		{

			$sSqlCheckUser.=" AND fld_subcategory = '".$subCategory."'";

		}

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";

		}
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
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}



		function getTrip($id='',$category='',$subcategory='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '',$city='')

	{

		$sSqlCheckUser = "SELECT * from tbl_trip WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}

		if($category !='')

		{

			$sSqlCheckUser.=" AND fld_category = '".$category."'";

		}
		if($subcategory !='')

		{

			$sSqlCheckUser.=" AND fld_subcategory = '".$subcategory."'";

		}
		

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";

		}
		if($city !='')

		{

			$sSqlCheckUser.=" AND fld_city = '".$city."'";

		}
		if($searchresult !='')

		{

			$sSqlCheckUser.=" AND fld_trip LIKE '%".$searchresult."%'";

		}
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;

		

		$this->execute_select_query($sSqlCheckUser); 

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}
    
    function getVechile($id='',$vechiletype='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '')

	{

		$sSqlCheckUser = "SELECT * from tbl_vechile WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}

		if($vechiletype !='')

		{

			$sSqlCheckUser.=" AND fld_vechile_type = '".$vechiletype."'";

		}
		
		

		
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser); 

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}


	function getAdventure($id='',$category='',$subcategory='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '',$city='')

	{

		$sSqlCheckUser = "SELECT * from tbl_adventure WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}

		if($category !='')

		{

			$sSqlCheckUser.=" AND fld_category = '".$category."'";

		}
		if($subcategory !='')

		{

			$sSqlCheckUser.=" AND fld_subcategory = '".$subcategory."'";

		}
		if($searchresult !='')

		{

			$sSqlCheckUser.=" AND fld_trip LIKE '%".$searchresult."%'";

		}

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";

		}
		if($city !='')

		{

			$sSqlCheckUser.=" AND fld_city = '".$city."'";

		}
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser); 

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}

	function getPackage($id='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '',$city='')

	{

		$sSqlCheckUser = "SELECT * from tbl_package  WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}


		

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";

		}
		if($city !='')

		{

			$sSqlCheckUser.=" AND fld_city = '".$city."'";

		}
		if($searchresult !='')

		{

			$sSqlCheckUser.=" AND fld_package LIKE '%".$searchresult."%'";

		}
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}
    function getTripList($id='',$package='')

	{

		$sSqlCheckUser = "SELECT * from tbl_package_trip WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}

		if($package !='')

		{

			$sSqlCheckUser.=" AND fld_package_id = '".$package."'";

		}
		
        $this->execute_select_query($sSqlCheckUser); 

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}
	function getAdventureList($id='',$package='')

	{

		$sSqlCheckUser = "SELECT * from tbl_package_adventure WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}

		if($package !='')

		{

			$sSqlCheckUser.=" AND fld_package_id = '".$package."'";

		}
		
        $this->execute_select_query($sSqlCheckUser); 

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}


     function getPackageTrip($id='',$package='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '')

	{

		$sSqlCheckUser = "SELECT * from tbl_package_trip as a LEFT JOIN tbl_trip as b on a.fld_trip_id = b.fld_id WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND b.fld_id  = '".$id."' ";

		}

		if($package !='')

		{

			$sSqlCheckUser.=" AND a.fld_package_id = '".$package."'";

		}

		

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND b.fld_status = '".$_sStatus."'";

		}
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}
	function getPackageAdventure($id='',$package='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '')

	{

		$sSqlCheckUser = "SELECT * from tbl_package_adventure as a LEFT JOIN tbl_adventure as b on a.fld_adventure_id = b.fld_id WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND b.fld_id  = '".$id."' ";

		}

		if($package !='')

		{

			$sSqlCheckUser.=" AND a.fld_package_id = '".$package."'";

		}

		

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND b.fld_status = '".$_sStatus."'";

		}
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}

	function getCityHotels($id='',$city='',$name='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '')

	{

		$sSqlCheckUser = "SELECT * from tbl_city_hotel WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}

		if($city !='')

		{

			$sSqlCheckUser.=" AND fld_city_id = '".$city."'";

		}
		if($name !='')

		{

			$sSqlCheckUser.=" AND fld_hotel = '%".$name."%'";

		}
		

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";

		}
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}
     
     function getBlog($id='',$category='',$subcategory='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '',$month='')

	{

		$sSqlCheckUser = "SELECT * from tbl_blog WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}
		if($month !='')

		{

			$sSqlCheckUser.=" AND MONTH(fld_date)  = '".$month."' ";

		}
		if($category !='')

		{

			$sSqlCheckUser.=" AND fld_category = '".$category."'";

		}
		if($subcategory !='')

		{

			$sSqlCheckUser.=" AND fld_subcategory = '".$subcategory."'";

		}
		
		if($searchresult !='')

		{

			$sSqlCheckUser.=" AND fld_title LIKE '%".$searchresult."%'";

		}
		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";

		}
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}
     
     function getBlogComment($id='',$blogid='')

	{

		$sSqlCheckUser = "SELECT * from tbl_comment WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}
		if($blogid !='')

		{

			$sSqlCheckUser.=" AND fld_blog_id  = '".$blogid."' ";

		}
		
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}
	 function getCms($id='',$category='',$subcategory='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '' , $searchresult = '')

	{

		$sSqlCheckUser = "SELECT * from tbl_cms WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}

		if($category !='')

		{

			$sSqlCheckUser.=" AND fld_category = '".$category."'";

		}
		if($subcategory !='')

		{

			$sSqlCheckUser.=" AND fld_subcategory = '".$subcategory."'";

		}
		

		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";

		}
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}

		function getCity($Id='',$city='',$_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_city WHERE 1=1 ";
		
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		
		if($city !='')
		{
			$sSqlCheckUser.=" AND fld_name = '".$city."'";
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

	function getBanner($Id='',$location='',$_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_banner WHERE 1=1 ";
		
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		
		if($location !='')
		{
			$sSqlCheckUser.=" AND fld_location = '".$location."'";
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

	function getPartner($Id='',$_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_partner WHERE 1=1 ";
		
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
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
	function getHotel($Id='',$price='',$_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_hotel WHERE 1=1 ";
		
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		if($price !='')
		{
			$sSqlCheckUser.=" AND fld_price = '".$price."'";
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
	function getGallery($Id='',$trip='',$date='',$_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_gallery WHERE 1=1 ";
		
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		if($trip !='')
		{
			$sSqlCheckUser.=" AND fld_trip_id = '".$trip."'";
		}
		if($date !='')
		{
			$sSqlCheckUser.=" AND fld_date = '".$date."'";
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
	function getRoom($Id='',$hotel='',$type='',$price='',$_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_city_hotel_room WHERE 1=1 ";
		
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		if($hotel !='')
		{
			$sSqlCheckUser.=" AND fld_city_hotel_id = '".$hotel."'";
		}
		if($type !='')
		{
			$sSqlCheckUser.=" AND fld_room = '".$type."'";
		}
		if($price !='')
		{
			$sSqlCheckUser.=" AND fld_price = '".$price."'";
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
	function changeUserStatus($tableName ,$id , $fldName , $status){



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

		 function changeHomeStatus($tableName ,$id , $fldName , $status){



    if($status==1){

      $sSqlResults="UPDATE $tableName SET `fld_home`= '0' WHERE $fldName=$id";

	  //echo $sSqlResults;

	  	$this->execute_update_query($sSqlResults);

	}

	else{

      $sSqlResults="UPDATE $tableName SET `fld_home`= '1' WHERE $fldName=$id";

     //   echo $sSqlResults;

	  	$this->execute_update_query($sSqlResults);

	} }

	function getCart($Id='',$guestsession='',$type='',$user_id='',$product_id='',$_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_order WHERE 1=1 ";
		
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		if($user_id !='')
		{
			$sSqlCheckUser.=" AND fld_session_id = '".$user_id."'";
		}
		if($guestsession !='')
		{
			$sSqlCheckUser.=" AND fld_previous_session = '".$guestsession."'";
		}
		if($type !='')
		{
			$sSqlCheckUser.=" AND fld_type = '".$type."'";
		}
		if($product_id !='')
		{
			$sSqlCheckUser.=" AND fld_product_id = '".$product_id."'";
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
    
    function getCartHotel($Id='',$guestsession='',$type='',$user_id='',$hotel_id='',$_sStatus='')
	{
		$sSqlCheckUser = "SELECT * from tbl_hotel_booking WHERE 1=1 ";
		
		if($Id !='')
		{
			$sSqlCheckUser.=" AND fld_id  = '".$Id."' ";
		}
		if($user_id !='')
		{
			$sSqlCheckUser.=" AND fld_session_id = '".$user_id."'";
		}
		if($guestsession !='')
		{
			$sSqlCheckUser.=" AND fld_previous_session = '".$guestsession."'";
		}
		if($type !='')
		{
			$sSqlCheckUser.=" AND fld_type = '".$type."'";
		}
		if($hotel_id !='')
		{
			$sSqlCheckUser.=" AND fld_hotel_id = '".$hotel_id."'";
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

	 function getNews($id='', $_sStatus='',$iOrderBy = '' ,$_sOrderType = '' ,$_iStart = '', $iLimit = '')

	{

		$sSqlCheckUser = "SELECT * from tbl_news WHERE 1=1 ";

		if($id !='')

		{

			$sSqlCheckUser.=" AND fld_id  = '".$id."' ";

		}
		
		if($_sStatus !='')

		{

			$sSqlCheckUser.=" AND fld_status = '".$_sStatus."'";

		}
		if($iOrderBy != '')
		{			
			$sSqlResults 		.=	" ORDER BY ".$iOrderBy; 
		}
		if($_sOrderType !='')
		{
			$sSqlResults		.= " ".$_sOrderType;
		}
		if($iLimit !='')
		{
			$sSqlResults		.= " LIMIT ".$_iStart. "," .$iLimit;
		}
		//echo $sSqlCheckUser;die;

		

		$this->execute_select_query($sSqlCheckUser);

		$this->aResults = $this->aQueryData;

		$this->iResults = $this->iTotalRecords;

		$this->sError = $this->sQueryError;

		$this->sResult = $this->sQueryResult;

	}

}

?>

