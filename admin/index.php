<?php 
require_once('../configuration/configuration.php');

if(isset($_SESSION['ADMIN_U']) ){
$_SESSION['ADMIN_U'] = $aAdmin[0]['fld_username'] ;

header('location:dashboard.php');
}

$oAdmin  = new AdminClass();
if(isset($_POST['submit']))
{
	
 $fld_login     =  $_POST['fld_username'];
$fld_password  =  $_POST['fld_password'];

$oAdmin->check_admin($fld_login,$fld_password,1);
$aAdmin = $oAdmin->aAdmin;
 $iAdmin = $oAdmin->iAdmin;
 $msg =0;
//print_r($aAdmin );die;
if($iAdmin > 0){
$_SESSION['ADMIN_ID'] = $aAdmin[0]['fld_id'] ;
$_SESSION['ADMIN_U'] = $aAdmin[0]['fld_username'] ;

header('location:dashboard.php');
}else{

	$msg =1;
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
	
	<title>Admin Login</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- icheck -->
	<link rel="stylesheet" href="css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="css/themes.css">


	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="js/plugins/validation/jquery.validate.min.js"></script>
	<script src="js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/eakroko.js"></script>

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

<body class='login'>
	<div class="wrapper">
		<h1><a href="index.php"><img src="img/logo-big.png" alt="" class='retina-ready' width="59" height="49">Admin</a></h1>
		<div class="login-body">
			<h2>SIGN IN</h2>
			<form  method='post' class='form-validate' id="test">
				<div class="control-group">
					<div class="email controls">
						<input type="text" name='fld_username' placeholder="Username" class='input-block-level' data-rule-required="true" data-rule-email="true">
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" name="fld_password" placeholder="Password" class='input-block-level' data-rule-required="true">
					</div>
				</div>
				<div class="submit">
					
					<input type="submit"  name="submit" value="Sign me in" class='btn btn-primary'>
					<br><br>
				</div>
			</form>
			
		</div>
	</div>
</body>

</html>
