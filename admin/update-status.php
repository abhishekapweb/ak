<?php 
require_once('../configuration/configuration.php');
$user		=	new ProductClass(); 

$id=$_GET['id'];

$status=$_GET['status'];

 $a=array_reverse(explode('/',$_SERVER['HTTP_REFERER']));


   if($a[0]=='manage-category.php'){
  
   $tableName='`tbl_category`';
   $fldName='`fld_id`';
 }
  if($a[0]=='manage-country.php'){
	
   $tableName='`countries`';
   $fldName='`fld_id`';
 }

    if($a[0]=='manage-subcategory.php'){
	
   $tableName='`tbl_subcategory`';
   $fldName='`fld_id`';
 }

 if($a[0]=='manage-cms.php'){
  
   $tableName='`tbl_cms`';
   $fldName='`fld_id`';
 }
if($a[0]=='manage-trip.php'){
  
   $tableName='`tbl_trip`';
   $fldName='`fld_id`';
 }
 
 if($a[0]=='manage-blog.php'){
  
   $tableName='`tbl_blog`';
   $fldName='`fld_id`';
 }
 if($a[0]=='manage-news.php'){
  
   $tableName='`tbl_news`';
   $fldName='`fld_id`';
 }
 $user->changeUserStatus($tableName , $id , $fldName , $status);


  header('location:'. $_SERVER['HTTP_REFERER']);
 
?>


