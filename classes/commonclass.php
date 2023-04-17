<?php
class CommonClass extends DBClass
{ 
	function paging($_iTotalRows,$_iPageNum,$_iPerPage,$_sParam,$_iOrderBy="")
	{
	    if ($_iTotalRows > 0)
	   {
		 $_iMaxPage=ceil($_iTotalRows/$_iPerPage);
		   
		   $sPage="";
		   $sStartPageNo="";
		   $iEndPageNum="";	
		   $iRemainder=$_iPageNum%5; 
		   $sStartPageNo=$_iPageNum-2 ;	 
		   $iEndPageNum=$_iPageNum +2;
		  
		  if($sStartPageNo<=0)
			{$sStartPageNo=1;$iEndPageNum=5;}
		  if($iEndPageNum>$_iMaxPage)
			{$iEndPageNum=$_iMaxPage;$sStartPageNo=$_iMaxPage-4;}
		  if($sStartPageNo<=0)
			{$sStartPageNo=1;}
		  
		  if($_iPageNum > 1) 
			{ 
				$sPage .= "<li><a href=".$_SERVER['PHP_SELF']."?page=".($_iPageNum-1).$_sParam.$_iOrderBy." title='Prev'><span class='normal_text'>&laquo;</span></a>&nbsp;</li>";
			}
		  for($i=$sStartPageNo;$i<=$iEndPageNum;$i++)
			{		
			   if($_iPageNum == $i) 
				{
					
					 $sPage .= "<li class='active'><a href='#'>&nbsp;". $_iPageNum."</a>&nbsp;</li>"; 
				}         
			   else 
				 { $sPage .= "&nbsp;<li><a href=".$_SERVER['PHP_SELF']."?page=".($i).$_sParam.$_iOrderBy." class='active'>$i</a>&nbsp;</li>"; }         
			}  
		 
		 if($_iPageNum < $_iMaxPage) 
			{  $sPage .= "<li><a href=".$_SERVER['PHP_SELF']."?page=".($_iPageNum+1).$_sParam.$_iOrderBy." class='active' title='Next'>&raquo;</a>&nbsp;&nbsp;</li>";}
			return "".$sPage; 
		}
		else
		{
			$sPage = "";
		} 
	}
	
	
	
	
	
	
	
	
	
	function deduce_text($_sStr,$_iLen)
	{
		$iStrlen = strlen($_sStr);
		if($iStrlen > $_iLen)
		{
			$sString = substr($_sStr,0,$_iLen);
			$sString.="...";
		}
		else
		{
			$sString = $_sStr;
		}
		return ($sString);	
	}
	
	function get_image_thumbnail_size($filename, $maxheight,$maxwidth)
	{
		if($filename)
		{
			$width = $maxwidth;
			$height = $maxheight;
			$imagehw = @getimagesize($filename);
			$width_orig = $imagehw[0];
			$height_orig = $imagehw[1];
			$x_ratio = 1;
			$y_ratio = 1;
			if ($width_orig > 0)
			{
				$x_ratio = $width / $width_orig;
			}
			if ($height_orig > 0)
			{
				$y_ratio = $height / $height_orig;
			}
	
			if( ($width_orig <= $width) && ($height_orig <= $height) )
			 {
				   $width = $width_orig;
				   $height = $height_orig;
			 }
			 elseif (($x_ratio * $height_orig) < $height)
			 {
				   $height = ceil($x_ratio * $height_orig);
				   $width = $width;
			 }
			 else
			 {
				   $width = ceil($y_ratio * $width_orig);
				   $height = $height;
			 }
			 
			$height_width_array[0] = $height;
			$height_width_array[1] = $width;
			return ($height_width_array);
		}	
	}
	
	function encrypt($string, $key) 
	{
		$result = '';
		for($i=0; $i<strlen($string); $i++) 
		{
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result.=$char;
		}
		return base64_encode($result);
	}
	
	function decrypt($string, $key) 
	{
		$result = '';
		$string = base64_decode($string);
		for($i=0; $i<strlen($string); $i++) 
		{
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		
		return $result;
	} 
	
	
	
	
	function calculate_duration($_sDate,$_sPosts="")
    {
  $aDate = str_replace("-", " ", $_sDate);
  $aBreakDate=explode(" ",trim($aDate));
  $iNewDay=$aBreakDate[2];
  $iNewMonth=$aBreakDate[1];
  $iNewYear=$aBreakDate[0];
  $iTempTime=$aBreakDate[3];
  $aBreakTime=explode(":",trim($iTempTime));
  $inewHour=$aBreakTime[0];
  $iNewMinute=$aBreakTime[1];
  $iNewSeconds=$aBreakTime[2];
  
  $iTodaysDate = date("Y-m-d H:i:s",mktime(date("G"),date("i"),date("s"),date("m"),date("d"),date("Y")));
  $iTodayDate = str_replace("-", " ", $iTodaysDate);
  $aTodayDate=explode(" ",trim($iTodayDate));
  $iTodayDate=$aTodayDate[2];
  $iTodayMonth=$aTodayDate[1];
  $iTodayYear=$aTodayDate[0];
  $iTempTime1=$aTodayDate[3];
  $iTodaysBreakTime=explode(":",trim($iTempTime1));
  $iTodayHour=$iTodaysBreakTime[0];
  $iTodayMinutes=$iTodaysBreakTime[1];
  $iTodaysSeconds=$iTodaysBreakTime[2];
  if($_sPosts!="")
  {
   $iTodayDate=strtotime($iTodaysDate);
   $iNewDate=strtotime($_sDate);
   $sTimeDiff = $iTodayDate - $iNewDate;
   $iHrTime=$sTimeDiff/3600;
   $aHrTime=explode(".",$iHrTime);
   $iHrDiff = $aHrTime[0];
   $iDays=$aHrTime[0] /24;
   $iHrDiff = $aHrTime[0] % 24;
   $aHrDays=explode(".",$iDays);
   $iNumDays=$aHrDays[0];
   $iMinDiff = round(($iHrTime - $aHrTime[0])*60);
   if ($iMinDiff >= 60)
   {
    $iMinDiff = $iMinDiff - 60;
    $iHrDiff = $iHrDiff + 1;
   }
   $sDuration = ", ";
   if($iNumDays>0)
   {    
    $sDuration=$iNumDays." Days ";
   }
   if ($iHrDiff == 1)
   {
    $sDuration.= $iHrDiff." hr ";
   } 
   elseif ($iHrDiff > 1)
   {
    $sDuration.= $iHrDiff." hrs ";
   } 
   
   if ($iMinDiff == 1)
   {
    $sDuration.= $iMinDiff." minute ";
   } 
   elseif ($iMinDiff > 1)
   {
    $sDuration.= $iMinDiff." minutes ";
   }
   if ($sDuration == ", ")
   {
    $sDuration="";   
   }
   
   else
   {
    $sDuration.="ago";
   }
   $sDuration = ltrim($sDuration, ",");
   if ($sDuration == "")
   {
    $sDuration = "less than a minute ago";
   }
   
   return ($sDuration);
  }
  else
  {
   if (($iNewYear == $iTodayYear) && ($iNewMonth == $iTodayMonth) && ($iNewDay == $iTodayDate))
   {
    $iTodayDate=strtotime($iTodaysDate);
    $iNewDate=strtotime($_sDate);
    $sTimeDiff = $iTodayDate - $iNewDate;
    $iHrTime=$sTimeDiff/3600;
    $aHrTime=explode(".",$iHrTime);
    $iHrDiff = $aHrTime[0];
    $iMinDiff = round(($iHrTime - $aHrTime[0])*60);
    if ($iMinDiff >= 60)
    {
     $iMinDiff = $iMinDiff - 60;
     $iHrDiff = $iHrDiff + 1;
    }
    $sDuration = ", ";
    if ($iHrDiff == 1)
    {
     $sDuration.= $iHrDiff." hr ";
    } 
    elseif ($iHrDiff > 1)
    {
     $sDuration.= $iHrDiff." hrs ";
    } 
    
    if ($iMinDiff == 1)
    {
     $sDuration.= $iMinDiff." minute ";
    } 
    elseif ($iMinDiff > 1)
    {
     $sDuration.= $iMinDiff." minutes ";
    }
    if ($sDuration == ", ")
    {
     $sDuration="";   
    }
    else
    {
     $sDuration.="ago";
    }
    $sDuration = ltrim($sDuration, ",");
    if ($sDuration == "")
    {
     $sDuration = "less than a minute ago";
    }
    return ($sDuration);
   }
   else
   {
    $aDate = str_replace("-", " ", $_sDate);
    $aBreakDate=explode(" ",trim($aDate));
    $iNewDay=$aBreakDate[2];
    $iNewMonth=$aBreakDate[1];
    $iNewYear=$aBreakDate[0];
    $iTempTime=$aBreakDate[3];
    $aBreakTime=explode(":",trim($iTempTime));
    $iNewHour=$aBreakTime[0];
    $iNewMinute=$aBreakTime[1];
    $iNewSeconds=$aBreakTime[2];
    
    $sDuration1 = @date("jS F Y h:i A",mktime($iNewHour,$iNewMinute,$iNewSeconds,$iNewMonth,$iNewDay,$iNewYear));
    $sDuration = $sDuration1." GMT";
    return ($sDuration);
   } 
  }  
 }
 
 
 
  		

 
}
?>