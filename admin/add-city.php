<?php include('../configuration/configuration.php');

$oGeneral = new GeneralClass();
$oProduct = new ProductClass();
$oProduct->getCategory();

$aCategory = $oProduct->aResults;
$iCategory = $oProduct->iResults;

$oProduct->getCity();
$aCity = $oProduct->aResults;
$iCity = $oProduct->iResults;

$sMode = $_REQUEST['type'];
if($sMode==''){$sMode='add';}
if($sMode=='add'){
if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_trip';
	
	
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
	header("Location:add-trip.php?message=1");
	} }else{

      $iPageId = $_REQUEST['id'];
	$oProduct->getTrip($iPageId );
    $aChannel = $oProduct->aResults;
	
	

	if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_trip';
	
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
				header("Location:add-trip.php?id={$iPageId}&message=2&type=edit");
	
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
	
	<title>Admin - Trip</title>

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
						<h1>Add Trip</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="forms-basic.html">Trip</a>
							<i class="icon-angle-right"></i>
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<?php if($_REQUEST['message']==1){ ?>
				<div class="alert alert-success">
					Trip is added successfully
				</div>
				<?php } ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Trip</h3>
							 </div>
							 <div class="box-content nopadding">
							<ul class="tabs tabs-inline tabs-top">
								<li class='active'>
									<a href="#profile" data-toggle='tab'><i class="icon-user"></i> Profile</a>
								</li>
								<li>
									<a href="#pricing" data-toggle='tab'><i class="icon-money"></i> Pricing</a>
								</li>
								
							</ul>
                                <div class="tab-content padding tab-content-inline tab-content-bottom">
								<div class="tab-pane active" id="profile">
								<form  method="POST" class='form-horizontal form-striped' enctype="multipart/form-data">
									<div class="control-group">
										<label for="textfield" class="control-label">Category</label>
										<div class="controls">
											<select name="fld_category"  class="input-xlarge category">
													<option value="">Select Category</option>
													<?php for($i=0;$i < $iCategory;$i++){?>
													<option <?=($aChannel[0]['fld_category']==$aCategory[$i]['fld_id'])?'selected':'';?> value="<?=$aCategory[$i]['fld_id']?>"><?=$aCategory[$i]['fld_category']?></option>
													<?php } ?>
													</select>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Sub Category</label>
										<div class="controls">
											<select name="fld_subcategory"  class="input-xlarge subcategory">
													<option value="">Select Sub-Category</option> 
													<?php if($sMode=='edit'){
 														for($i=0;$i < $iSubCategory;$i++){
														?>
														<option <?=($aChannel[0]['fld_subcategory']==$aSubCategory[$i]['fld_subcategory'])?'selected':'';?> value="<?=$aSubCategory[$i]['fld_id']?>"><?=$aSubCategory[$i]['fld_subcategory']?></option>
													<?php } ?>
														<?php }  ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Trip</label>
										<div class="controls">
											<input type="text" name="fld_trip" value="<?=$aChannel[0]['fld_trip']?>" id="textfield" placeholder="Trip" class="input-xlarge">
										</div>
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">Trip Image</label>
										<div class="controls">
											<input type="file" name="fld_image" id="textfield" placeholder="Category" class="input-xlarge">
											<?php if($aChannel[0]['fld_image']){?>
											<img src="../uploads/<?=$aChannel[0]['fld_image']?>" height="100" width="100">
											<?php } ?>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Start City</label>
										<div class="controls">
											<input type="text"  name="fld_start_city" value="<?=$aChannel[0]['fld_start_city']?>" id="textfield" placeholder="" class="input-xlarge">
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">End City</label>
										<div class="controls">
											<input type="text"  name="fld_end_city" id="textfield" placeholder="" class="input-xlarge" value="<?=$aChannel[0]['fld_end_city']?>">
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">City</label>
										<div class="controls">
											<select name="fld_city"  class="input-xlarge">
												<option value="">Select City</option>
												<?php for($i=0;$i < $iCity;$i++){?>
												<option <?=($aChannel[0]['fld_city']==$aCity[$i]['fld_id'])?'selected':'';?> value="<?=$aCity[$i]['fld_id']?>"><?=$aCity[$i]['fld_name']?></option>
												<?php } ?>
												</select>
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Min Group Size</label>
										<div class="controls">
											<input type="text"  name="fld_min_group" id="textfield" placeholder="" class="input-xlarge" value="<?=$aChannel[0]['fld_min_group']?>">
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Max Group Size</label>
										<div class="controls">
											<input type="text"  name="fld_max_group" id="textfield" placeholder="" class="input-xlarge" value="<?=$aChannel[0]['fld_max_group']?>">
											
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Duration</label>
										<div class="controls">
											<input type="text"  name="fld_duration" id="textfield" placeholder="" class="input-xlarge" value="<?=$aChannel[0]['fld_max_group']?>">
											
										</div>
									</div>
									<div class="control-group">
										<label for="textarea" class="control-label">Description</label>
										<div class="controls">
											<textarea name="fld_discription" id="textarea" rows="5" class="input-block-level"><?=$aChannel[0]['fld_discription']?> </textarea>
										</div>
									</div>
									
								
								</div>
								<div class="tab-pane" id="pricing">
								<span   class='form-horizontal form-striped'>
									
									<div class="control-group">
										<label for="textfield" class="control-label">Price</label>
										<div class="controls col-sm-10">
										<div class="col-sm-2">
										    <label for="textfield" class="form-control">Adult </label>
											<input type="text" name="fld_adult" value="<?=$aChannel[0]['fld_adult']?>" class="input-xlarge">
										</div>
										</div>
									</div>
								
									<div class="control-group">
										<label for="textfield" class="control-label">&nbsp;</label>
										<div class="controls">
										<label for="textfield" class="form-control">Child</label>
											<input type="text" name="fld_child" value="<?=$aChannel[0]['fld_child']?>" class="input-xlarge">
										</div>
									</div>
									
									
									</span>
								
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

		    <script>
               jQuery(".category").change(function() {
                var id = jQuery(this).val();
               
                var dataString = 'id=' + id ;
           
                //alert(dataString);
                jQuery.ajax({
                    type: "POST",
                    url: "get-subcategory.php",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                        jQuery(".subcategory").html(html);
                    }
                });
            });
	</script>

	</html>

