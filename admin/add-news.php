<?php include('../configuration/configuration.php');

$oGeneral = new GeneralClass();
$oProduct = new ProductClass();
$oProduct->getCategory();

$aCategory = $oProduct->aResults;
$iCategory = $oProduct->iResults;

$sMode = $_REQUEST['type'];
if($sMode==''){$sMode='add';}
if($sMode=='add'){
if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_news';
	
	
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
							echo $sReturn			=	$oGeneral->upload_files($sALLOWED_EXT, $aImage, $dirPath, $sFileName);
				
                if($sReturn == '0'){
                	 $upload_img = $oGeneral->cwUpload('../uploads/',$sDatabaseFileName,'../uploads/news/','1170','450');
				$aData['fld_image'] = $sDatabaseFileName;
				
                }
               }
			}		
	
	$iPageInsertId	       =	$oGeneral->insert_data($sTableName, $aData);
	header("Location:add-news.php?message=1");
	} }else{

      $iPageId = $_REQUEST['id'];
	$oProduct->getNews($iPageId );
    $aChannel = $oProduct->aResults;
	

	if(isset($_POST['submit'])){
	
	$aData = $_POST;
	$sTableName = 'tbl_news';
	
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
				header("Location:add-news.php?id={$iPageId}&message=2&type=edit");
	
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
	
	<title>Admin - News</title>

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
    <script src="js/plugins/ckeditor/ckeditor.js"></script>
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
						<h1>Add News</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="manage-news.php">News</a>
							<i class="icon-angle-right"></i>
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
				<?php if($_REQUEST['message']==1){ ?>
				<div class="alert alert-success">
					News is added successfully
				</div>
				<?php } ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-bordered">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> News</h3>
							 </div>
							 <div class="box-content nopadding">
							
                                <div class="tab-content padding tab-content-inline tab-content-bottom">
								<div class="tab-pane active" id="profile">
								<form  method="POST" class='form-horizontal form-striped form-wysiwyg' enctype="multipart/form-data">
									
									
									<div class="control-group">
										<label for="textfield" class="control-label">Title</label>
										<div class="controls">
											<input type="text" name="fld_title" value="<?=$aChannel[0]['fld_title']?>" id="textfield" placeholder="Title" class="input-xlarge">
										</div>
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">Date</label>
										<div class="controls">
											<input type="text" name="fld_date" value="<?=$aChannel[0]['fld_date']?>" id="textfield" placeholder="yyyy-mm-dd" class="input-xlarge">
										</div>
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">News Image</label>
										<div class="controls">
											<input type="file" name="fld_image" id="textfield" placeholder="Category" class="input-xlarge">
											<?php if($aChannel[0]['fld_image']){?>
											<img src="../uploads/<?=$aChannel[0]['fld_image']?>" height="100" width="100">
											<?php } ?>
										</div>
									</div>
									<div class="control-group">
										<label for="textarea" class="control-label">Description</label>
										<div class="controls">
											<textarea name="fld_news" id="textarea" rows="5" class="ckeditor span12"><?=$aChannel[0]['fld_news']?> </textarea>
										</div>
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

