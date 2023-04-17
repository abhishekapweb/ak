<?php include('../configuration/configuration.php');

$oGeneral = new GeneralClass();
$oProduct = new ProductClass();
$oProduct->getCityHotels();
$aCategory = $oProduct->aResults;
$iCategory = $oProduct->iResults;
$id = $_REQUEST['id'];

$sMode = $_REQUEST['type'];
if($sMode==''){$sMode='add';}
if($sMode=='add'){
if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_city_hotel_room';
		//$sTableName = 'tbl_trip';
	$iPageInsertId	       =	$oGeneral->insert_data($sTableName, $aData);
	header("Location:add-room.php?message=1");
	} }else{
	$iPageId = $_REQUEST['id'];
	$oProduct->getSubCategory($iPageId);
    $aSubCategory = $oProduct->aResults;
	
	if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_city_hotel_room';
			
	
	$iPageInsertId	       =	$oGeneral->update_data($sTableName,'fld_id', $aData,$iPageId);
				header("Location:add-room.php?id={$iPageId}&message=2&type=edit");
	
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
	
	<title>Admin - Hotels</title>

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
						<h1>Add Hotels</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="forms-basic.html">Hotels</a>
							<i class="icon-angle-right"></i>
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<?php if($_REQUEST['message']==1){ ?>
				<div class="alert alert-success">
					Hotels is added successfully
				</div>
				<?php } ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Hotels</h3>
							</div>
							<div class="box-content nopadding">
								<form  method="POST" class='form-horizontal form-striped' enctype="multipart/form-data">
									
									<div class="control-group">
									<label for="textfield" class="control-label">Hotel</label>
									<div class="controls">
										<select name="fld_city_hotel_id"  class="input-xlarge">
												<option value="">Select Hotel</option>
												<?php for($i=0;$i < $iCategory;$i++){?>
												<option <?=($id==$aCategory[$i]['fld_id'])?'selected':'';?> value="<?=$aCategory[$i]['fld_id']?>"><?=$aCategory[$i]['fld_hotel']?></option>
												<?php } ?>
												</select>
									</div>
								</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Room Type</label>
										<div class="controls">
											<select name="fld_room"  class="input-xlarge">
												<option value="">Select Room Type</option>
												<option value="1">SingleRoom Type</option>
												<option value="2">Double Room Type</option>
												<option value="3">Triple Room Type</option>
												<option value="4">Multiple Room Type</option>
												</select>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Price</label>
										<div class="controls">
											<input type="text" name="fld_price" value="<?=$aSubCategory[0]['fld_price']?>" id="textfield" placeholder="Price Starts" class="input-xlarge">
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

