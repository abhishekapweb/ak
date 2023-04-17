<?php include('../configuration/configuration.php');

$oCategory = new ProductClass();
$oCategory->getCityHotels();
$aCategory = $oCategory->aResults;
$iCategory = $oCategory->iResults;

  
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
	
	<title>Admin - City Hotel</title>

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
    <link rel="stylesheet" href="css/plugins/datatable/TableTools.css">

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
	<script src="js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="js/plugins/datatable/TableTools.min.js"></script>
	<script src="js/plugins/datatable/ColReorderWithResize.js"></script>
	<script src="js/plugins/datatable/ColVis.min.js"></script>
	<script src="js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
	<script src="js/plugins/datatable/jquery.dataTables.grouping.js"></script>
	<!-- Chosen -->
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
    	 <script>
    function removeList(id)
	{
		 var x= confirm("Are you sure delete?");
			 if (x==true) {
			$("#row"+id).remove();	
											
			$.post( "delete-city-hotels.php?id="+id, function( data ) {
					$('.vd_hidden').css('display','block');
					$('.vd_hidden').html(data);				

			});
	}else{return false;}
		
	}
    
    </script>
</head>

<body>
	<?php include('header.php') ;?>
	<div class="container-fluid" id="content">
		<?php include('sidebar.php') ;?>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Manage Category</h1>
					</div>
					
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="dashboard.php">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="manage-city-hotels.php">Manage Category</a>
							<i class="icon-angle-right"></i>
						</li>
						
					</ul>
					<div class="close-bread">
						<a href="#"><i class="icon-remove"></i></a>
					</div>
				</div>
			
				<div class="alert alert-success vd_hidden">
					
				</div>
				
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Manage Category
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable">
									<thead>
										<tr>
											<th>Name</th>
											<th>City / Address</th>
											<th>Description</th>
											<th>Image</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										 <?php for($i=0;$i < $iCategory;$i++){?>
													<tr id="row<?=$aCategory[$i]['fld_id']?>">
														<td><?=$aCategory[$i]['fld_hotel']?></td>
														<td><?=$aCategory[$i]['fld_address']?></td>
														<td><?=$aCategory[$i]['fld_discription']?></td>
														<td><img src="../uploads/<?=$aCategory[$i]['fld_image']?>" height="100" width="100"></td>
														<td> <a href="update-status.php?id=<?=$aCategory[$i]['fld_id']?>&status=<?=$aCategory[$i]['fld_status']?>"><button class="btn btn-success"><?=($aCategory[$i]['fld_status']==1)?'Active':'Inactive';?></button></a></td>
														<td><a class="btn menu-icon  vd_bd-grey vd_success" href="add-city-hotels.php?id=<?=$aCategory[$i]['fld_id']?>&type=edit">Edit</a>&nbsp;<a class="btn menu-icon  vd_bd-grey vd_grey" onClick="removeList(<?=$aCategory[$i]['fld_id']?>);">Delete</a>&nbsp;<br><br><a class="btn menu-icon  vd_bd-grey vd_success" href="add-room.php?id=<?=$aCategory[$i]['fld_id']?>">Add Room</a>&nbsp;<a class="btn menu-icon  vd_bd-grey vd_success" href="manage-room.php?id=<?=$aCategory[$i]['fld_id']?>">Manage Room</a></td>
													</tr>
                                                    <?php } ?>
										
									</tbody>
								</table>
							
							</div>
						</div>
					</div>
				</div>
				
			
			</div>
		</div></div>
		
	</body>

	</html>

