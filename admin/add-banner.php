<?php include('../configuration/configuration.php');

$oGeneral = new GeneralClass();
$oProduct = new ProductClass();
$oProduct->getCategory('','',1);
$aCategory = $oProduct->aResults;
$iCategory = $oProduct->iResults;

$sMode = $_REQUEST['type'];
if($sMode==''){$sMode='add';}
if($sMode=='add'){
if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_banner';
		//$sTableName = 'tbl_trip';
	
	
		$iImageId = basename($_FILES['fld_image']['name']);
		
		if($iImageId != "")
			{			
			if($_FILES['fld_image']['size'] > 0)

			{
                            $aImage = $_FILES['fld_image'];
                            $sFileName			=	uniqid();
				            $aExt			    =	explode('.', $aImage['name']);  //Get the extention of File
							$sExt				=	strtolower(end($aExt));	//To get the extention and change it lower case
							$sDatabaseFileName	= 	$sFileName.".".$sExt;	
							$dirPath			=	'../uploads';
							$sReturn			=	$oGeneral->upload_files($sALLOWED_EXT, $aImage, $dirPath, $sFileName);
				
                if($sReturn == '0'){
				$aData['fld_banner'] = $sDatabaseFileName;
				
                }
               }
			}		
			//print_r($aData);die;	
	
	$iPageInsertId	       =	$oGeneral->insert_data($sTableName, $aData);
	header("Location:add-banner.php?message=1");
	} }else{
	$iPageId = $_REQUEST['id'];
	$oProduct->getBanner($iPageId);
    $aSubCategory = $oProduct->aResults;
	
	if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_banner';
			
	$iImageId = basename($_FILES['fld_image']['name']);
		
		if($iImageId != "")
			{			
			if($_FILES['fld_image']['size'] > 0)

			{
                            $aImage = $_FILES['fld_image'];
                            $sFileName			=	uniqid();
				            $aExt			    =	explode('.', $aImage['name']);  //Get the extention of File
							$sExt				=	strtolower(end($aExt));	//To get the extention and change it lower case
							$sDatabaseFileName	= 	$sFileName.".".$sExt;	
							$dirPath			=	'../uploads';
							$sReturn			=	$oGeneral->upload_files($sALLOWED_EXT, $aImage, $dirPath, $sFileName);
				
                if($sReturn == '0'){
				$aData['fld_banner'] = $sDatabaseFileName;
				
                }
               }
			}	
	$iPageInsertId	       =	$oGeneral->update_data($sTableName,'fld_id', $aData,$iPageId);
				header("Location:add-banner.php?id={$iPageId}&message=2&type=edit");
	
	}
	
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>Admin - Banner</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- imagesLoaded -->
	<script src="js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<!-- Touch enable for jquery UI -->
	<script src="js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
	<!-- slimScroll -->
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Bootbox -->
	<script src="js/plugins/bootbox/jquery.bootbox.js"></script>

	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
	<!-- Just for demonstration -->
	<script src="js/demonstration.min.js"></script>

	<!--[if lte IE 9]>
		<script src="js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

</head>

<body>
	<?php include('header.php') ;?>
	<div class="container-fluid" id="content">
		<?php include('sidebar.php') ;?>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Add Banner</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="forms-basic.html">Banner</a>
							<i class="icon-angle-right"></i>
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<?php if($_REQUEST['message']==1){ ?>
				<div class="alert alert-success">
					Banner is added successfully
				</div>
				<?php } ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Banner</h3>
							</div>
							<div class="box-content nopadding">
								<form  method="POST" class='form-horizontal form-striped' enctype="multipart/form-data">
									<div class="control-group">
										<label for="textfield" class="control-label">Location<?=$aSubCategory[$i]['fld_location']?></label>
										<div class="controls">
											<select name="fld_location"  class="input-xlarge">
													<option value="">Select Location</option>
													<option <?=($aSubCategory[0]['fld_location']==1)?'selected':'';?> value="1">Home</option>
													<option <?=($aSubCategory[0]['fld_location']==2)?'selected':'';?> value="2">Product Listing</option>
													<option  <?=($aSubCategory[0]['fld_location']==3)?'selected':'';?> value="3">Product Detail</option>
													<option <?=($aSubCategory[0]['fld_location']==4)?'selected':'';?> value="4">Booking</option>
													<option <?=($aSubCategory[0]['fld_location']==5)?'selected':'';?> value="5">Login</option>
													<option <?=($aSubCategory[0]['fld_location']==6)?'selected':'';?> value="6">Registration</option>
													<option <?=($aSubCategory[0]['fld_location']==7)?'selected':'';?> value="7">Common</option>
													<option <?=($aSubCategory[0]['fld_location']==8)?'selected':'';?> value="8">About Banner Home Page</option>
													</select>
										</div>
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">Heading One</label>
										<div class="controls">
											<input type="text" name="fld_heading_one" value="<?=$aSubCategory[0]['fld_heading_one']?>" id="textfield" placeholder="Heading One" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Heading Two</label>
										<div class="controls">
											<input type="text" name="fld_heading_two" value="<?=$aSubCategory[0]['fld_heading_two']?>" id="textfield" placeholder="Heading Two" class="input-xlarge">
										</div>
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">Banner Image</label>
										<div class="controls">
											<input type="file" name="fld_image" class="input-xlarge">
										</div>
									</div>
								
									<div class="form-actions">
										<button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
										<button type="button" class="btn">Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
			
			</div>
		</div></div>
		
	</body>

	</html>

