<?php include_once('../configuration/configuration.php');
      $oProduct = new ProductClass();
     $id = $_REQUEST['id'];
     
      $oProduct->getSubCategory('',$id,'','',1);
      $aProduct = $oProduct->aResults;
       $iProduct = $oProduct->iResults;
?>
 
<?php if($iProduct){ ?><option value="">Select Subcategory</option><?php 
for($i=0;$i < $iProduct;$i++){ ?>
 <option value="<?=$aProduct[$i]['fld_id']?>"> <?=$aProduct[$i]['fld_subcategory']?></option>
<?php
} } 
?>