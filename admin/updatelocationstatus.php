<?php 
require_once('../configuration/configuration.php');
$location		=	new locationClass(); 

$id=$_GET['id'];

$status=$_GET['status'];

 $a=array_reverse(explode('/',$_SERVER['HTTP_REFERER']));



  if($a[0]=='manage-country.php'){
	
   $tableName='`countries`';
   $fldName='`id`';
 }

    if($a[0]=='manage-state.php'){
	
   $tableName='`states`';
   $fldName='`id`';
 }

 if($a[0]=='manage-city.php'){
  
   $tableName='`cities`';
   $fldName='`id`';
 }

 $location->changelocationStatus($tableName , $id , $fldName , $status);


  header('location:'. $_SERVER['HTTP_REFERER']);
 
?>


