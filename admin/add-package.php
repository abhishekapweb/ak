<?php include('../configuration/configuration.php');

$oGeneral = new GeneralClass();
$oCategory = new ProductClass();
$oCategory->getTrip();
$aTrip = $oCategory->aResults;
$iTrip = $oCategory->iResults;

$oCategory->getCity();
$aCity = $oCategory->aResults;
$iCity = $oCategory->iResults;

$eTrip = array();
$oCategory->getAdventure();
$aAdventure = $oCategory->aResults;
$iAdventure = $oCategory->iResults;
$eAdventure = array();
$sMode = $_REQUEST['type'];
if($sMode==''){$sMode='add';}
if($sMode=='add'){
if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_package';
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
                	
                 $upload_img = $oGeneral->cwUpload('../uploads/',$sDatabaseFileName,'../uploads/ntrip/','270','240');
				$aData['fld_image'] = $sDatabaseFileName;
				
                }
               }
			}			
	
	$iPageInsertId	       =	$oGeneral->insert_data($sTableName, $aData); 
	$bData['fld_package_id'] = $iPageInsertId;
	foreach($aData['fld_trip'] as $value){
		$bData['fld_trip_id'] = $value;
        $oGeneral->insert_data('tbl_package_trip', $bData);
	}
	foreach($aData['fld_adventure'] as $value){
		$bData['fld_adventure_id'] = $value;
        $oGeneral->insert_data('tbl_package_adventure', $bData);
	}
	header("Location:add-package.php?message=1");
	} } else{
	$iPageId = $_REQUEST['id'];
	$oCategory->getPackage($iPageId);
    $aPackage = $oCategory->aResults;
	$oCategory->getPackageTrip('',$iPageId);
    $aPackageTrip = $oCategory->aResults;
    foreach($aPackageTrip as $value){
    	$eTrip[] = $value['fld_trip_id'];
    }
    $oCategory->getPackageAdventure('',$iPageId);
    $aPackageAdventure = $oCategory->aResults;
    foreach($aPackageAdventure as $value){
    	$eAdventure[] = $value['fld_adventure_id'];
    }
    //print_r($eChannel);die;
	if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_package';
			
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
							$dirPath			=	'../uploads/';
							$sReturn			=	$oGeneral->upload_files($sALLOWED_EXT, $aImage, $dirPath, $sFileName);
				
                if($sReturn == '0'){
					unlink('../uploads'.$aChannel[0]['fld_image']);
				$aData['fld_image'] = $sDatabaseFileName;
				
                }
               }
			}	

	$iPageInsertId	       =	$oGeneral->update_data($sTableName,'fld_id', $aData,$iPageId);

	$oGeneral->delete_record('tbl_package_trip', 'fld_package_id', $iPageId);
	$bData['fld_package_id'] = $iPageId;
	foreach($aData['fld_trip'] as $value){
		$bData['fld_trip_id'] = $value;
        $oGeneral->insert_data('tbl_package_trip', $bData);
	}
	$oGeneral->delete_record('tbl_package_adventure', 'fld_package_id', $iPageId);
	$bData['fld_package_id'] = $iPageId;
	foreach($aData['fld_adventure'] as $value){
		$bData['fld_adventure_id'] = $value;
        $oGeneral->insert_data('tbl_package_adventure', $bData);
	}
				header("Location:add-package.php?id={$iPageId}&message=2&type=edit");
	
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
	
	<title>Admin - Package</title>

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
    <link rel="stylesheet" href="css/plugins/icheck/all.css">

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
    <script src="js/plugins/icheck/jquery.icheck.min.js"></script>
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
						<h1>Add Package</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="#">Package</a>
							<i class="icon-angle-right"></i>
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<?php if($_REQUEST['message']==1){ ?>
				<div class="alert alert-success">
					Package is added successfully
				</div>
				<?php } ?>
				<?php if($_REQUEST['message']==2){ ?>
				<div class="alert alert-success">
					Package is updated successfully
				</div>
				<?php } ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Package</h3>
							</div>
							<div class="box-content nopadding">
								<form  method="POST" class='form-horizontal form-striped' enctype="multipart/form-data">
									<div class="control-group">
										<label for="textfield" class="control-label">Package</label>
										<div class="controls">
											<input type="text" name="fld_package" value="<?=$aPackage[0]['fld_package']?>" id="textfield" placeholder="Package Name" class="input-xlarge">
										</div>
									</div>
									
									<div class="control-group">
											<label for="textfield" class="control-label">Trip List</label>
											<div class="controls">
												<div class="check-demo-col">
												<?php for($i=0;$i < $iTrip;$i++){ 
													if($i%2==0){
													?>
													<div class="check-line">
														<input type="checkbox" name="fld_trip[]" class='icheck-me' <?=(in_array(@$aTrip[$i]['fld_id'], @$eTrip))?'checked':'';?> value="<?=$aTrip[$i]['fld_id']?>" id="c<?=$aTrip[$i]['fld_id']?>" data-skin="square" data-color="green"> <label class='inline' for="c1"><?=$aTrip[$i]['fld_trip']?></label>
													</div>
													<?php } } ?>
												</div>
												<div class="check-demo-col">
												<?php for($i=0;$i < $iTrip;$i++){ if($i%2!=0){?>
													<div class="check-line">
														<input type="checkbox" name="fld_trip[]" class='icheck-me' <?=(in_array(@$aTrip[$i]['fld_id'], @$eTrip))?'checked':'';?> value="<?=$aTrip[$i]['fld_id']?>" id="c<?=$aTrip[$i]['fld_id']?>" data-skin="square" data-color="green"> <label class='inline' for="c1"><?=$aTrip[$i]['fld_trip']?></label>
													</div>
													<?php } } ?>
												</div>
											</div>
										</div>

										<div class="control-group">
											<label for="textfield" class="control-label">Adventure List</label>
											<div class="controls">
												<div class="check-demo-col">
												<?php for($i=0;$i < $iAdventure;$i++){ 
													if($i%2==0){
													?>
													<div class="check-line">
														<input type="checkbox" name="fld_adventure[]" class='icheck-me' <?=(in_array(@$aAdventure[$i]['fld_id'], @$eAdventure))?'checked':'';?> value="<?=$aTrip[$i]['fld_id']?>" id="c<?=$aTrip[$i]['fld_id']?>" data-skin="square" data-color="green"> <label class='inline' for="c1"><?=$aAdventure[$i]['fld_trip']?></label>
													</div>
													<?php } } ?>
												</div>
												<div class="check-demo-col">
												<?php for($i=0;$i < $iAdventure;$i++){ if($i%2!=0){?>
													<div class="check-line">
														<input type="checkbox" name="fld_adventure[]" class='icheck-me' <?=(in_array(@$aAdventure[$i]['fld_id'], @$eAdventure))?'checked':'';?> value="<?=$aTrip[$i]['fld_id']?>" id="c<?=$aTrip[$i]['fld_id']?>" data-skin="square" data-color="green"> <label class='inline' for="c1"><?=$aAdventure[$i]['fld_trip']?></label>
													</div>
													<?php } } ?>
												</div>
											</div>
										</div>

										<div class="control-group">
										<label for="textfield" class="control-label">Package Image</label>
										<div class="controls">
											<input type="file" name="fld_image" id="textfield" placeholder="Category" class="input-xlarge">
											<?php if($aPackage[0]['fld_image']){?>
											<img src="../uploads/<?=$aPackage[0]['fld_image']?>" height="100" width="100">
											<?php } ?>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Total Package Cost</label>
										<div class="controls">
											<input type="text" readonly name="fld_adult_cost" id="textfield" placeholder="Adult" class="input-xlarge">
											<input type="text" readonly name="fld_child_cost" id="textfield" placeholder="Child" class="input-xlarge">
										</div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">New Package Cost</label>
										<div class="controls">
											<input type="text" name="fld_adult" value="<?=$aPackage[0]['fld_adult']?>" id="textfield" placeholder="Adult" class="input-xlarge">
											<input type="text" name="fld_child" value="<?=$aPackage[0]['fld_child']?>" id="textfield" placeholder="Child" class="input-xlarge">
										</div>
									</div>
										<div class="control-group">
										<label for="textarea" class="control-label">Short Description</label>
										<div class="controls">
											<textarea name="fld_discription" id="textarea" rows="5" class="input-block-level"><?=$aPackage[0]['fld_discription']?> </textarea>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Total Package Cost</label>
										<div class="controls">
											<input type="text" readonly name="fld_adult_cost" id="textfield" placeholder="Adult" class="input-xlarge">
											<input type="text" readonly name="fld_child_cost" id="textfield" placeholder="Child" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Start City</label>
										<div class="controls">
											<input type="text"  name="fld_start_city" id="textfield" placeholder="" class="input-xlarge" value="<?=$aPackage[0]['fld_start_city']?>">
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">End City</label>
										<div class="controls">
											<input type="text"  name="fld_end_city" id="textfield" placeholder="" class="input-xlarge" value="<?=$aPackage[0]['fld_end_city']?>">
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">City</label>
										<div class="controls">
											<select name="fld_city"  class="input-xlarge">
												<option value="">Select City</option>
												<?php for($i=0;$i < $iCity;$i++){?>
												<option <?=($aPackage[0]['fld_city']==$aCity[$i]['fld_id'])?'selected':'';?> value="<?=$aCity[$i]['fld_id']?>"><?=$aCity[$i]['fld_name']?></option>
												<?php } ?>
												</select>
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Min Group Size</label>
										<div class="controls">
											<input type="text"  name="fld_min_group" id="textfield" placeholder="" class="input-xlarge" value="<?=$aPackage[0]['fld_min_group']?>">
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Max Group Size</label>
										<div class="controls">
											<input type="text"  name="fld_max_group" id="textfield" placeholder="" class="input-xlarge" value="<?=$aPackage[0]['fld_max_group']?>">
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Duration</label>
										<div class="controls">
											<input type="text"  name="fld_duration" id="textfield" placeholder="" class="input-xlarge" value="<?=$aPackage[0]['fld_max_group']?>">
											
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

